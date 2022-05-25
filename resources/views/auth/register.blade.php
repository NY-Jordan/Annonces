@extends('../layouts/page')
@section('page_content');
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Acceuil</a> -</li>
                    <li class="active">Page d'inscription</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mt-2">{{ $error }}</div>
                    @endforeach
                @endif
                @if (session('message'))
                    <div class="alert alert-danger dt-success-msg f12">{{ session('message') }}</div>
                @endif
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper mb--sm">
                        <div class="gradient-title">
                            <h2>Creer un Compte</h2>
                        </div>

                        <div class="input-layout1 gradient-padding">
                            <form id="login-page-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger ">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name">Nom<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first_name" value='{{ old('first_name') }}'
                                                name="first_name" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="last-name">Pre-Nom<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="last_name" value='{{ old('last_name') }}'
                                                name="last_name" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label">Ville<span> *</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <select id="location-name" name="location_id" class='select2 form-control '>
                                                <option value="0">Selectionner une Ville</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">
                                                        {{ $location->locationName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="district">Quartier<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="district" name="district" class="form-control"
                                                placeholder="district">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label possition-top" for="first-name">Genre
                                            <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <div class="radio radio-primary radio-inline">
                                                <input type="radio" id="inlineRadio3" value="Male" name="gender[]"
                                                    checked="">
                                                <label for="inlineRadio3">Male</label>
                                            </div>
                                            <div class="radio radio-primary radio-inline">
                                                <input type="radio" id="inlineRadio4" value="Female" name="gender[]">
                                                <label for="inlineRadio4">Femelle</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="phone">Telephone 1<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="mobile_phone1" class="form-control"
                                                placeholder="Your Phone Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="phone">Telephone 2</label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="mobile_phone2" class="form-control"
                                                placeholder="Your Phone Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label">A propos de vous<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <textarea placeholder="Write here something about you"
                                                class="textarea form-control" name="about_yourself" id="form-message1"
                                                rows="4" cols="20" data-error="Message field is required"
                                                required>{{ old('about_yourself') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name">Email <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name2" value="{{ old('email') }}" name="email"
                                                class="form-control" placeholder="Enter your e-mail here . . .">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="password">Mot de passe <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-sm-9 col-12 ml-none--mb">
                                        <div class="form-group">
                                            <button type="submit" class="cp-default-btn-sm">S'enregistrer Maintenant !</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
