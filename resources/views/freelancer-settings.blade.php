@extends('layout.app')
@section('content')

<!-- Dashboard Container -->
<div class="clearfix"></div>


{{--	<!-- Dashboard Sidebar -->--}}
{{--	<div class="dashboard-sidebar">--}}
{{--		<div class="dashboard-sidebar-inner" data-simplebar>--}}
{{--			<div class="dashboard-nav-container">--}}

{{--				<!-- Responsive Navigation Trigger -->--}}
{{--				<a href="#" class="dashboard-responsive-nav-trigger">--}}
{{--					<span class="hamburger hamburger--collapse" >--}}
{{--						<span class="hamburger-box">--}}
{{--							<span class="hamburger-inner"></span>--}}
{{--						</span>--}}
{{--					</span>--}}
{{--					<span class="trigger-title">Dashboard Navigation</span>--}}
{{--				</a>--}}

{{--				<!-- Navigation -->--}}
{{--				<div class="dashboard-nav">--}}
{{--					<div class="dashboard-nav-inner">--}}

{{--						<ul data-submenu-title="Start">--}}
{{--							<li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>--}}
{{--							<li><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>--}}
{{--							<li><a href="dashboard-bookmarks.html"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>--}}
{{--							<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Organize and Manage">--}}
{{--							<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>--}}
{{--									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>--}}
{{--									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--							<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>--}}
{{--									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>--}}
{{--									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>--}}
{{--									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Account">--}}
{{--							<li class="active"><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>--}}
{{--							<li><a href="index-logged-out.html"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>--}}
{{--						</ul>--}}

{{--					</div>--}}
{{--				</div>--}}
{{--				<!-- Navigation / End -->--}}

{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<!-- Dashboard Sidebar / End -->--}}


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Settings</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Settings</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

                <div class="col-xl-12">
                    <form action="/freelancer-info" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">

                                <div class="row">

                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            <img class="profile-pic" src="{{$image}}" alt="freelancers_image" />
                                            <div class="upload-button"></div>
                                            <input id="image" name="image" class="file-upload" type="file" accept="image/*"/>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>First Name</h5>
                                                    <input type="text" class="with-border" name="firstName" value="{{$first_name}}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Last Name</h5>
                                                    <input type="text" class="with-border" name="lastName" value="{{$last_name}}">
                                                </div>
                                            </div>



                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Email</h5>
                                                    <input type="text" class="with-border" name="email" value="{{$email}}">
                                                </div>
                                            </div>


                                            <div class="col-xl-6">
                                                <div class="fun-facts-container" >
                                                    <span class="fun-fact zoom" data-fun-fact-color="#36bd78" onclick="location='/freelancer-bids'">
                                                        <div class="fun-fact-text" >
                                                            <span>Task Bids Won</span>
                                                            <h4>{{$bids_won}}</h4>
                                                        </div>
                                                        <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                                                    </span>
                                                    <span class="fun-fact zoom" data-fun-fact-color="#b81b7f" onclick="location='/freelancer-applications'">
                                                        <div class="fun-fact-text" >
                                                            <span>Jobs Applied</span>
                                                            <h4>{{$jobs_applied}}</h4>
                                                        </div>
                                                        <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                                                    </span>

                                                </div>
                                            </div>



                                        </div>
                                        <div class="col">
                                            <div class="col-xl-4">
                                                <div class="submit-field">
                                                    <h5>Tasks Done : {{$tasks_done}}</h5>
                                                    <input type="hidden" class="with-border" name="tasks_done" value="{{$tasks_done}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> My Profile</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">
                                <li>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <div class="bidding-widget">
                                                    <!-- Headline -->
                                                    <span class="bidding-detail">Set your <strong>minimal hourly rate</strong></span>

                                                    <!-- Slider -->
                                                    <div class="bidding-value margin-bottom-10">$<span id="biddingVal"></span></div>
                                                    <input name="hourly_rate" class="bidding-slider" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="5" data-slider-max="150" data-slider-value="{{$hourly_rate}}" data-slider-step="1" data-slider-tooltip="hide" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Skills    e.g. Angular, Laravel <i class="help-icon" data-tippy-placement="right" title="Pleas separate each skill by an empty space "></i></h5>

                                                <!-- Skills List -->
                                                <div class="keywords-container">
                                                    <div class="keyword-input-container">
                                                        <input name="skills" type="text" class="keyword-input with-border" value="{{$skills}}"/>
                                                    </div>
{{--                                                    <div class="keywords-list">--}}
{{--                                                        @foreach($skills as $skill)--}}
{{--                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">{{$skill}}</span></span>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Tagline</h5>
                                                <input type="text" name="tagline" class="with-border" value="{{$tagline}}">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="submit-field">
                                                <h5>Nationality</h5>
                                                <select name="nationality" class="selectpicker with-border" data-size="7" title="Select Job Type" data-live-search="true">
                                                    <option value="Afganistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bonaire">Bonaire</option>
                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Canary Islands">Canary Islands</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Channel Islands">Channel Islands</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Island">Cocos Island</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curaco">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Great Britain">Great Britain</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="India">India</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>

                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea North">Korea North</option>
                                                    <option value="Korea Sout">Korea South</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Midway Islands">Midway Islands</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Nambia">Nambia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                    <option value="Nevis">Nevis</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau Island">Palau Island</option>
                                                    <option value="Palestine" selected>Palestine</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Phillipines">Philippines</option>
                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russia</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                    <option value="St Eustatius">St Eustatius</option>
                                                    <option value="St Helena">St Helena</option>
                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                    <option value="St Lucia">St Lucia</option>
                                                    <option value="St Maarten">St Maarten</option>
                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                    <option value="Saipan">Saipan</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Samoa American">Samoa American</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Tahiti">Tahiti</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                    <option value="United States of America">United States of America</option>
                                                    <option value="Uraguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican City State">Vatican City State</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                    <option value="Wake Island">Wake Island</option>
                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zaire">Zaire</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Introduce Yourself</h5>
                                                <textarea name="description"  cols="30" rows="5" class="with-border">{{$description}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                        {{--                    <div class="col-xl-12">--}}
{{--                        <div id="test1" class="dashboard-box">--}}

{{--                            <!-- Headline -->--}}
{{--                            <div class="headline">--}}
{{--                                <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>--}}
{{--                            </div>--}}

{{--                            <div class="content with-padding">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>Current Password</h5>--}}
{{--                                            <input name="password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>New Password</h5>--}}
{{--                                            <input name="new-password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>Repeat New Password</h5>--}}
{{--                                            <input name="confirm-new-password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-12">--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" id="two-step" checked>--}}
{{--                                            <label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via Email</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Button    -->
{{--                        Paaaaaaaaaaaaassssssssword--}}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="col-xl-12">
                        <button  type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>
			<!-- Row / End -->
		</div>
	</div>
	<!-- Dashboard Content / End -->


<!-- Dashboard Container / End -->

<br><br>
@endsection
