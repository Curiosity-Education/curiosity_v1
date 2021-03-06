@extends('templates.parent-menu')

@section('title')
Mi Perfil
@stop
@section('title-baner')
 <i class="fa fa-user"></i> Mi perfil
@stop
@section('content-parent')
   <div class="container-fluid main" id="p-container-main">
      <div class="row">
      	<div class="row" id="p-row-main">
         <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">
             <!--Form about novedades-->
            <div class="card card-border-standard animated fadeInUpBig p-card-new-parent" data-wow-delay="1s" id="card-news">
                <div class="card-block hidden-xs-down">
                    <!--Header-->
                    <div class="form-header p-novedades bg-blue darken-4">
                        <h3 class="h3-responsive"><i class="fa fa-matk-question"></i>Quizás te interese...</h3>
                    </div>
                     <ul class="p-list-news">
                      @foreach(DB::table('novedades_papa')
                                      ->select('*')
                                      ->where('status','=','1')
                                      ->limit(8)
                                      ->orderBy('id','DESC')
                                      ->get() as $new)
                          <li class="p-item-new" data-pdf="{{$new->pdf}}" data-namepdf="{{$new->titulo}}">
                            <div class="card hoverable card-border-standard p-card-new">
                              <div class="card-block">
                                <div class="card-left border-right">
                                  <div class="p-img-new">
                                    <img src="/packages/assets/media/images/parents/profile/pdf.ico" class="img-thumbnail">
                                  </div>
                                </div>
                                <div class="card-right">
                                  <div class="p-card-title text-xs-left">
                                    <h5>{{$new->titulo}}</h5>
                                  </div>
                                  <div class="p-card-description text-xs-left">
                                    <p>{{$new->descripcion}}</p>
                                  </div>
                                  <hr>
                                  <div class="p-footer-card text-right">
                                    <p class="date-time">{{$new->created_at}}</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        @endforeach
                     </ul>
                </div>
                <div class="hidden-sm-up" id="p-content-novelty">
        					<div class="list-group">
        					  <a href="#" class="list-group-item active">
        						Quizás te interese...
        					  </a>
        					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Sucesiones Númericas</a>
        					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Resolución de problemas</a>
        					  <a href="#" class="list-group-item text-xs-left"><i class="fa fa-file-pdf-o"></i>&nbsp; Gráfica de barras</a>
        					</div>
                        </div>
            </div>
            <!--/Form about novedades-->
             <!--Form for refresh perfil-->
            <form id="p-frm-user">
            <div class="card card-border-standard p-card-update-user p-card-user animated fadeInRightBig" data-wow-delay="1s" id="card-data-editing">
                <div class="card-block" id="p-cardData">
                    <!--Header-->
                    <div class="form-header p-data-editing bg-blue darken-4">
                        <h3 class="h3-responsive"><i class="fa fa-matk-question"></i> Mis datos</h3>
                    </div>
                     <!--Body-->
                    <input type="hidden" value="{{Auth::user()->id}}" name="id" id="id">
                    <div class="tab-1 active animated fadeIn p-tab">
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="username" name="username" class="form-control" value="{{$username}}" length="40" placeholder="Usuario">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$nombre}}" placeholder="Nombre(s)">
                        </div>

                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{$apellidos}}" placeholder="Apellido(s)">
                        </div>
                    </div>
                    <div class="tab-2 animated fadeIn p-tab">
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Contraseña actual">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Contraseña nueva" length="100">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="cnew_password" name="cnew_password" class="form-control" placeholder="Confirmar contraseña" length="100">
                        </div>
                    </div>
                    <div class="tab-3 animated fadeIn p-tab p-tab3">
                        <div class="md-form">
                            <select class="mdb-select" id="sexo" name="sexo">
                                <option value="" disabled>Sexo</option>
                                @if($sexo == "M" || $sexo== "m")
                                <option value="M" selected data-icon="/packages/assets/media/images/parents/profile/dad-def.png" class="rounded-circle">Masculino</option>
                                <option value="F" data-icon="/packages/assets/media/images/parents/profile/mom-def.png" class="rounded-circle">Femenino</option>
                                @elseif($sexo == "F" || $sexo == "m")
                                <option value="M" selected data-icon="/packages/assets/media/images/parents/profile/dad-def.png" class="rounded-circle">Masculino</option>
                                <option value="F" data-icon="/packages/assets/media/images/parents/profile/mom-def.png" class="rounded-circle">Femenino</option>
                                @endif
                            </select>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-phone prefix"></i>
                            <input type="text" id="telefono" name="telefono" class="form-control" length="10" placeholder="Teléfono" value="{{$telefono}}">
                        </div>
                    </div>
                    <div class="text-xs-center p-content-buttons animated fadeIn">
                     	<center>
                     	   	<button type="button" class="btn btn-outline-warning waves-effect border-standard btn-return btn-to-move p-btnBack" disabled data-step="1">Regresar</button>
                      		<button type="button" class="btn border-standard btn-next btn-to-move p-btnNext" data-step="1">Siguiente</button>
                      		<button type="button" class="btn btn-green border-standard p-btn-update hidden p-btnSave" id="p-btn-update">Guardar cambios</button>
                     	</center>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                          <ul class="stepper stepper-horizontal p-stepper-user">
                              <li class="active">
                                  <a>
                                      <span class="circle">1</span>
                                  </a>
                              </li>
                              <li>
                                  <a>
                                      <span class="circle">2</span>
                                  </a>
                              </li>
                              <li>
                                  <a>
                                      <span class="circle">3</span>
                                  </a>
                              </li>
                          </ul>

                      </div>
                    </div>
                </div>
            </div>
            </form>
            <!--/Form for refresh perfil-->
         </div>
         <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 border-left">
            <!--Card-->
            <div class="card card-border-standard testimonial-card animated fadeInRight" data-wow-delay="1s">
                <!--Bacground color-->
                <div class="card-up bg-blue pf-bgCardEdit">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="/packages/assets/media/images/parents/profile/{{Auth::user()->Person->Dad->foto_perfil}}" class="rounded-circle img-responsive">
                </div>

                <div class="card-block">
                    <!--Name-->
                    <h4 class="card-title">Padre Curiosity</h4>
                    <hr>
                    <!-- data list-->
                    <ul class="list text-justify hidden-md-down p-cardInfo" >
                      <li class="list-item"><i class="fa fa-user"></i>&nbsp; Nombre(s): <span id="span-name">{{Auth::user()->Person->nombre}}</span></li>
                      <li class="list-item"><i class="fa fa-user"></i>&nbsp; Apellido(s): <span id="span-surnames">{{Auth::user()->Person->apellidos}}</span></li>
						          <li class="list-item"><i class="fa fa-phone"></i>&nbsp; teléfono: <span id="span-telephone">+52 {{Auth::user()->Person->Dad->telefono}}</span></li>
                    </ul>
                    <hr class="hidden-md-down p-cardInfo">
                    <!--//.. end data list -->
                    <!--Quotation-->
                    <a class="btn pf-bg-default btn-border-curiosity waves-effect waves-light pf-border-rounded" data-card="card-1" id="btn-toggle-cards" data-target="#card-data-editing"><i class="fa fa-edit"></i> Editar mis datos</a>
                </div>
            </div>
            <!--/.Card-->
         </div>
      </div>
      <!-- view pdf -->
      <div class="row animated fadeInUp hidden" id="p-row-pdf">
        <div class="col-md-12">
            <div class="card card-border-standard" id="p-card-pdf">
              <div class="view hm-black-strong z-depth-1 col-xs-12" id="p-banner-showPDF">
                <div class="mask border-standard flex-center">
                 <h4 class="h4-responsive white-text"><i class="fa fa-file-pdf-o hidden-xs-down"></i>&nbsp; <span id="p-t"></span> &nbsp;&nbsp;<i class="float-xs-right fa fa-times-circle hidden-sm-up dismiss-card" data-toggle="tooltip" data-placement="bottom" title="Cerrar PDF"></i></h4>
                </div>
                 <a class="btn-floating btn-small primary-color-dark float-xs-right hidden-xs-down dismiss-card" data-dismiss-card="#p-row-pdf" data-toggle="tooltip" data-placement="left" title="Cerrar PDF"><i class="fa fa-times"></i></a>
              </div>
              <div class="card-block">
                <embed src="" type="application/pdf" width="100%" height="100%" id="p-pdf">
                <h1 class="h1-responsive text-xs-center" id="p-text-info">Por favor gira tu dispositivo para mejor lectura</h1>
              </div>
            </div>
        </div>
      </div>
      <!--//.. end view pdf -->
      </div>
   </div>
@stop

@section('js-plus')
<script type="text/javascript" src="/packages/libs/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="/packages/libs/validation/localization/messages_es.min.js"></script>
<script type="text/javascript" src="/packages/assets/js/parent/models/dist/Parent-dist.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/parent/controllers/parentController.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/parent/profile.js?{{rand();}}"></script>
<script type="text/javascript" src="/packages/assets/js/parent/dispatchers/dsp-parent-profile.js?{{rand();}}"></script>
@stop
