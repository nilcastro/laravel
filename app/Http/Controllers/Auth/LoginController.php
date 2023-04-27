<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
   
    
      use AuthenticatesUsers;
    
      /**
       * Where to redirect users after login.
       *
       * @var string
       */
      protected $redirectTo = RouteServiceProvider::HOME;
      protected  $maxAttempts = 2;
      protected $decayMinutes = 1;
    
      public function login(Request $request,)
      {
    
        $dataPost = $request->request->all();
        // dd($dataPost);
        if($dataPost) {
          $email_P = $dataPost['username'];
          $password_P = $dataPost['password'];
          $AUTHENTICATION_WS_OK = "AUTORIZADO";
          $null = "null";
          $response = Http::post('https://ws-dev.upb.edu.co:8443/General/Autenticacion2/', 
            // 'https://ws.upb.edu.co:8443/General/Autenticacion2/',
            [
              "Username" => "upb_refrigerios",
              "Password" => "MFcbPby4x1LBFCvbxI2W",
              // "Password" => "MFcbPby4x1LBFCvbxI2W", clave de dev  R6Y19QJg00Y14dsVTsL pdn
              "LdapUser" => $email_P,
              "LdapPwd" => $password_P
            ]
          );
      
          $autorizado_json = json_decode($response->body())->{"ESTADO"};
          
          $userlog = DB::table('users')
                  ->select("username")
                  ->where('username','=',$email_P)
                  ->get();

          if($userlog == $email_P){
            dd('si esntra');
            $request->session()->regenerate();
      
            return redirect('solicitud');
          }else{
              
            if ($autorizado_json == $AUTHENTICATION_WS_OK) {
            
                // consulta jefe y dependencia 
              $proxyUsers = Http::withHeaders([
                "Username" => "upb_refrigerios",
                "Password" => "MFcbPby4x1LBFCvbxI2W"
              ])->get('https://ws-dev.upb.edu.co:8443/Empleados/Ubicaciones', [
                "pidm" => $email_P,
                "filter" => "desc_cargo,id_jefe_inmediato,desc_centro_costo,nombre_dependencia" 
              ]);
              $proxyUserss = $proxyUsers->json();
              //  dd($proxyUserss);
              if($proxyUserss){
                $proxyUserjef = Http::withHeaders([
                  "Username" => "upb_refrigerios",
                  "Password" => "MFcbPby4x1LBFCvbxI2W"
                ])->get('https://ws-dev.upb.edu.co:8443/General/EzproxyUsers', [
                  "pidm" => $proxyUserss[0]['ID_JEFE_INMEDIATO'],
                    "filter" => "pidm,tipo_usuario,activo,nombre,apellidos,email,programa", 
                ]);
                $proxyUserjefE = $proxyUserjef->json();

                if($proxyUserjefE){
                  $proxyUser = Http::withHeaders([
                    "Username" => "upb_refrigerios",
                    "Password" => "MFcbPby4x1LBFCvbxI2W"
                  ])->get('https://ws-dev.upb.edu.co:8443/General/EzproxyUsers', [
                    "pidm" => $email_P,
                    // "filter" => "pidm,tipo_usuario,activo,nombre,apellidos,email,programa", 
                    //"sede" => "Medellín"
                  ]);
                  $proxyUsers = $proxyUser->json();
                  if($proxyUsers){

                    if(isset($proxyUsers[0]["ACTIVO"]) == "SI" &&
                            ($proxyUsers[0]["TIPO_USUARIO"] == "Administrativo" ||
                            $proxyUsers[0]["TIPO_USUARIO"] == "Estudiante" ||
                            $proxyUsers[0]["TIPO_USUARIO"] == "Docente")
                      ) {
                      $user = User::firstOrCreate([
                        'username' => $email_P
                      ], [
                      'name' => $proxyUser[0]['NOMBRE'],
                      'apellidos' => $proxyUser[0]['APELLIDOS'],
                      'email' => $proxyUser[0]['EMAIL'],
                      'programa' => $proxyUser[0]['PROGRAMA'],
                      'nombre_centroc' => $proxyUserss[0]['DESC_CENTRO_COSTO'],
                      'cargo' => $proxyUserss[0]['DESC_CARGO'],
                      'jefe' => $proxyUserss[0]['ID_JEFE_INMEDIATO'],
                      'email_jefe' => $proxyUserjefE[0]['EMAIL'],
                      'nombre_jefe' => $proxyUserjefE[0]['NOMBRE'],
                      'apellido_jefe' => $proxyUserjefE[0]['APELLIDOS'],
                    ]);

                      Auth::guard('web')->login($user);
                      $request->session()->regenerate();
          
                      return redirect('solicitud');
                      
                    }elseif(isset($proxyUsers[0]["ACTIVO"]) == "SI" &&
                      ($proxyUsers[0]["TIPO_USUARIO"] ==  "Egresado")
                    ) {
            
                      return redirect('login')->with('mensaje', ' Solicite permiso a esta aplicación su perfil es de "Egresado"');
                    }
                  }else {
                    return redirect('login')->with('mensaje', 'Verifique sus datos ingresados, puede que no esté autorizado para ingresar a esta aplicación');
                  }
                }else {
                    return redirect('login')->with('mensaje', 'Verifique sus datos ingresados, puede que no esté autorizado para ingresar a esta aplicación');
                }
              }else {
      
                return redirect('login')->with('mensaje', 'Verifique sus datos ingresados, puede que no esté autorizado para ingresar a esta aplicación');
              }
            }elseif ($autorizado_json != $AUTHENTICATION_WS_OK) {
    
            return redirect('login')->with('mensaje', 'Verifique sus datos ingresados, puede que no esté autorizado para ingresar a esta aplicación');
          }
        }
      }
    }
    
    public function username()
    {
      return 'username';
    }
    public function logout()
    {
      Auth::logout();
      return redirect('login');
    }
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
  }
    