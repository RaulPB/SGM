<?php 
    namespace SGM\Http\Controllers;

    use Illuminate\Http\Request;
    use Auth;//utilizado para la validacion de acceso
    use Session;
    use Redirect;
    use SGM\Http\Requests;
    use SGM\Http\Controllers\Controller;
    use SGM\Http\Requests\LoginRequest;//utilizado para la validacion de acceso
    use SGM\User;
    use SGM\Serv;
    use SGM\Mensaje;
    use DB;
    use Cookie;

    class LogController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(LoginRequest $request) //LoginRequest $request aqui tenemos que poner un request que valide el correcto funcionamiento de acceso al sistema.
        {
            if(Auth::attempt(['email'=> $request['email'],'password'=>$request['password']])){ //si coinciden
                //return Redirect::to('admin');//ESTA REDIRECCION ES PARA CUANDO NO RECUPERAMOS DATOS DEL MENSAJE
               // $mensaje = Mensaje::where('id', '=', 1)->get()->first();
            //$x=$mensaje ->mensaje;

                //return redirect('/admin');//->with('success', $x);
                $emi = $request['email'];
                $idusu = DB::table('users')->where('email', '=', $emi)->pluck('id');
                Cookie::queue('Cookie2', $idusu, 60);
                return view('layouts/admin');
            }
            Session::flash('message-error', 'Datos Incorrectos');
            return Redirect::to('/');


           /* $mensaje = Mensaje::where('id', '=', 1)->get()->first();
            $x=$mensaje ->mensaje;
            return redirect('/admin')->with('success', $x);*/
        }

        public function logout(){
            Cookie::queue(
            Cookie::forget('Cookie2','Orden')
            
        );
          Auth::logout();
          return Redirect::to('/');
      }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
           //return redirect('/pdf');
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
