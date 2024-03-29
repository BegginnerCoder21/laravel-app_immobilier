		
@extends('layouts.dashboard.admin')
@section('content')

		<!-- page content -->
		<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Villes</h3>
						</div>

					
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Create<small>Villes</small></h2>
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
									<form class="form" action="{{ route('admin.properties.features.store',$property->id) }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf

                          <input type="hidden" name="property_id" value="">
                                <div class="row justify-content-md-center">
                                  <div class="col-md-8">
                                    <div class="form-body">

                              
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="projectinput1"> Zone </label>
                                              <input type="number" id="area"
                                                     class="form-control"
                                                     placeholder="  "
                                                     value="{{old('area')}}"
                                                     name="area">
                                              @error("area")
                                              <span class="text-danger">message</span>
                                              @enderror
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> Chambres
                                            </label>
                                            <input type="number" id="rooms"
                                                   class="form-control"
                                                   placeholder="  "
                                                   value="{{old('rooms')}}"
                                                   name="rooms">
                                            @error("rooms")
                                            <span class="text-danger">message d'erreur</span>
                                            @enderror
                                        </div>
                                    </div>

                                    
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="projectinput1"> Chambres à coucher
                              </label>
                              <input type="number" id="bedrooms"
                                     class="form-control"
                                     placeholder="  "
                                     value="{{old('bedrooms')}}"
                                     name="bedrooms">
                              @error("bedrooms")
                              <span class="text-danger">message</span>
                              @enderror
                          </div>
                      </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="projectinput1"> Salles de bains
                              </label>
                              <input type="number" id="bathrooms"
                                    class="form-control"
                                    placeholder="  "
                                    value="{{old('bathrooms')}}"
                                    name="bathrooms">
                              @error("bathrooms")
                              <span class="text-danger">message erreur</span>
                              @enderror
                          </div>
                        </div>

                                    </div>
                                    <h4 class="form-section"><i class="ft-navigation-2"></i> info sur l'etiquette</h4>
                                    <div class="row">
                                      <div class="col-lg-3">
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="air_condition" value="1" class="flat" > <span>Climatisation</span>
                                        </label>
                                        @error("air_condition")
                                        <span class="text-danger">message erreur</span>
                                        @enderror
                                      </div>
                                    </div>

                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="swimming_pool" value="1" class="flat"  > <span>Piscine</span>
                                          </label>
                                        </div>
                                        @error("swimming_pool")
                                        <span class="text-danger">message erreur</span>
                                        @enderror
                                      </div>

                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="central_heating" value="1" class="flat"  > <span>Chauffage central</span>
                                          </label>
                                        </div>
                                        @error("central_heating")
                                        <span class="text-danger">message</span>
                                        @enderror
                                      </div>
                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="laundry_room" value="1" class="flat"  > <span>Buanderie</span>
                                          </label>
                                        </div>
                                        @error("laundry_room")
                                        <span class="text-danger">message</span>
                                        @enderror
                                      </div>
                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="gym" value="1" class="flat"  > <span>Gymnastique</span>
                                          </label>
                                        </div>
                                        @error("gym")
                                        <span class="text-danger">message</span>
                                        @enderror
                                      </div>
                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="alarm" value="1" class="flat"  > <span>Alarme</span>
                                          </label>
                                        </div>
                                        @error("alarm")
                                        <span class="text-danger">message erreur</span>
                                        @enderror
                                      </div>
                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="window_covering" value="1" class="flat"  > <span>Couverture de fenêtre</span>
                                          </label>
                                        </div>
                                        @error("window_covering")
                                        <span class="text-danger">message erreur</span>
                                        @enderror
                                      </div>

                                      <div class="col-lg-3">
                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="Internet" value="1" class="flat"  > <span>Internet</span>
                                          </label>
                                        </div>

                                        @error("Internet")
                                        <span class="text-danger">message erreur</span>
                                        @enderror
                                      </div>
                                 

                                    </div>

                                </div>

							                                	<div class="ln_solid"></div>
                                                    
                                              <div class="item form-group">
                                              <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" onclick="history.back();" type="button" >Annuler</button>
                                                <button type="submit" class="btn btn-success">Soumettre</button>
                                              </div>
                                              </div>
                          
                                    </div>
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
