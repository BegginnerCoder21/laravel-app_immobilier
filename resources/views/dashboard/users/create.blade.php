		
@extends('layouts.dashboard.admin')
@section('content')

		<!-- page content -->
		<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Utilisateurs</h3>
						</div>

					
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Créer<small>Utilisateur</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
							
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>


								<div class="x_content">
									<br />
									<form class="form" action="{{ route('admin.users.store') }}" method="POST"
									enctype="multipart/form-data">
									@csrf
									@foreach ($errors->all() as $error)
									<div class="text-red-500 mt-2xx">
										{{$error}}
									</div>
								@endforeach

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="text" id="name"
											class="form-control"
											placeholder="  "
											value="{{old('name')}}"
											name="name">
												@error("name")
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>


							

										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="email" id="email"
											class="form-control"
											placeholder="  "
											value="{{old('email')}}"
											name="email">
												@error("email")
												<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>


							

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mot de passe <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="password" id="password"
											class="form-control"
											placeholder="  "
											name="password">
										
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirmation Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="password" id=""
											class="form-control"
											placeholder="  "
											name="password_confirmation" >
											
											</div>
										</div>



						
								
								
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Annuler</button>
												<button type="submit" class="btn btn-success">Soumettre</button>
											</div>
										</div>

									</form>

							
								</div>
							</div>
						</div>
					</div>

				
					
				</div>
			</div>
			<!-- /page content -->

@stop
