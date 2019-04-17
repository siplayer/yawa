<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!--<div class="breadcrumb">
                <h1 class="mr-2">{u s=$namecontroller}</h1>
                <ul>
                    <li><a href="{$url_base}/backend/Compte">{u s=$namecontroller}</a></li>
                    
                </ul>
            </div>
			
            <div class="separator-breadcrumb border-top"></div>
            -->
             <div class="row">
               
                <div class="col-md-12">
                    <div class="card text-left">

                        <div class="card-body">
                            <h4 class="card-title mb-3"><cite title="Source Title">Paramètres système</cite></h4>

                            <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-icon-pill" data-toggle="pill" href="#generalPIll" role="tab" aria-controls="generalPIll" aria-selected="true"><i class="nav-icon i-Gear mr-1"></i>Géneral</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#facturePIll" role="tab" aria-controls="facturePIll" aria-selected="false"><i class="nav-icon i-Financial mr-1"></i> Facturation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#paimentPIll" role="tab" aria-controls="paimentPIll" aria-selected="false"><i class="nav-icon i-Money-2 mr-1"></i> Mode paiment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#fedilitePIll" role="tab" aria-controls="fedilitePIll" aria-selected="false"><i class="nav-icon i-Medal-2"></i> Fidélité</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#impotPIll" role="tab" aria-controls="impotPIll" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Impôts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#pdfPIll" role="tab" aria-controls="pdfPIll" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Pdf</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myPillTabContent">
                                <div class="tab-pane fade show active" id="generalPIll" role="tabpanel" aria-labelledby="home-icon-pill">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="card-title mb-3">Réglages généraux</div>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="firstName1">Adresse e-mail</label>
                                                                <input type="text" class="form-control" id="firstName1" placeholder="Enter your first name">
                                                            </div>

                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="lastName1">Nom</label>
                                                                <input type="text" class="form-control" id="lastName1" placeholder="Enter your last name">
                                                            </div>

                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="exampleInputEmail1">Prénom</label>
                                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                            </div>

                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="phone">Téléphone</label>
                                                                <input class="form-control" id="phone" placeholder="Enter phone">
                                                            </div>

                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="credit1">Fuseau horaire</label>
                                                                <select class="form-control">
                                                                    <option value=""> -- </option>
                                                                    <option label="(UTC-12:00) International Date Line West" value="string:Etc/GMT+12">(UTC-12:00) International Date Line West</option>
                                                                    <option label="(UTC-11:00) Coordinated Universal Time -11" value="string:Etc/GMT+11">(UTC-11:00) Coordinated Universal Time -11</option>
                                                                    <option label="(UTC-10:00) Hawaii" value="string:Pacific/Honolulu">(UTC-10:00) Hawaii</option><option label="(UTC-09:00) Alaska" value="string:America/Anchorage">(UTC-09:00) Alaska</option><option label="(UTC-08:00) Pacific Time (US and Canada)" value="string:America/Los_Angeles">(UTC-08:00) Pacific Time (US and Canada)</option><option label="(UTC-08:00) Baja California" value="string:America/Tijuana">(UTC-08:00) Baja California</option><option label="(UTC-07:00) Mountain Time (US and Canada)" value="string:America/Denver">(UTC-07:00) Mountain Time (US and Canada)</option><option label="(UTC-07:00) Chihuahua, La Paz, Mazatlan" value="string:America/Chihuahua">(UTC-07:00) Chihuahua, La Paz, Mazatlan</option><option label="(UTC-07:00) Arizona" value="string:America/Phoenix">(UTC-07:00) Arizona</option><option label="(UTC-06:00) Saskatchewan" value="string:America/Regina">(UTC-06:00) Saskatchewan</option><option label="(UTC-06:00) Central America" value="string:America/Guatemala">(UTC-06:00) Central America</option><option label="(UTC-06:00) Central Time (US and Canada)" value="string:America/Chicago">(UTC-06:00) Central Time (US and Canada)</option><option label="(UTC-06:00) Guadalajara, Mexico City, Monterrey" value="string:America/Mexico_City">(UTC-06:00) Guadalajara, Mexico City, Monterrey</option><option label="(UTC-05:00) Eastern Time (US and Canada)" value="string:America/New_York">(UTC-05:00) Eastern Time (US and Canada)</option><option label="(UTC-05:00) Bogota, Lima, Quito" value="string:America/Bogota">(UTC-05:00) Bogota, Lima, Quito</option><option label="(UTC-05:00) Indiana (East)" value="string:America/Indianapolis">(UTC-05:00) Indiana (East)</option><option label="(UTC-04:30) Caracas" value="string:America/Caracas">(UTC-04:30) Caracas</option><option label="(UTC-04:00) Atlantic Time (Canada)" value="string:America/Halifax">(UTC-04:00) Atlantic Time (Canada)</option><option label="(UTC-04:00) Cuiaba" value="string:America/Cuiaba">(UTC-04:00) Cuiaba</option><option label="(UTC-04:00) Santiago" value="string:America/Santiago">(UTC-04:00) Santiago</option><option label="(UTC-04:00) Georgetown, La Paz, Manaus, San Juan" value="string:America/La_Paz">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option><option label="(UTC-04:00) Asuncion" value="string:America/Asuncion">(UTC-04:00) Asuncion</option><option label="(UTC-03:30) Newfoundland" value="string:America/St_Johns">(UTC-03:30) Newfoundland</option><option label="(UTC-03:00) Brasilia" value="string:America/Sao_Paulo">(UTC-03:00) Brasilia</option><option label="(UTC-03:00) Greenland" value="string:America/Godthab">(UTC-03:00) Greenland</option><option label="(UTC-03:00) Montevideo" value="string:America/Montevideo">(UTC-03:00) Montevideo</option><option label="(UTC-03:00) Cayenne, Fortaleza" value="string:America/Cayenne">(UTC-03:00) Cayenne, Fortaleza</option><option label="(UTC-03:00) Buenos Aires" value="string:America/Buenos_Aires">(UTC-03:00) Buenos Aires</option><option label="(UTC-02:00) Mid-Atlantic" value="string:Etc/GMT+2">(UTC-02:00) Mid-Atlantic</option><option label="(UTC-01:00) Azores" value="string:Atlantic/Azores">(UTC-01:00) Azores</option><option label="(UTC-01:00) Cabo Verde Is." value="string:Atlantic/Cape_Verde">(UTC-01:00) Cabo Verde Is.</option><option label="(UTC+00:00) Dublin, Edinburgh, Lisbon, London" value="string:Europe/London">(UTC+00:00) Dublin, Edinburgh, Lisbon, London</option><option label="(UTC+00:00) Monrovia, Reykjavik" value="string:Atlantic/Reykjavik">(UTC+00:00) Monrovia, Reykjavik</option><option label="(UTC+00:00) Casablanca" value="string:Africa/Casablanca">(UTC+00:00) Casablanca</option><option label="(UTC+00:00) Coordinated Universal Time" value="string:Etc/GMT">(UTC+00:00) Coordinated Universal Time</option><option label="(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague" value="string:Europe/Budapest">(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option><option label="(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb" value="string:Europe/Warsaw">(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option><option label="(UTC+01:00) Brussels, Copenhagen, Madrid, Paris" value="string:Europe/Paris">(UTC+01:00) Brussels, Copenhagen, Madrid, Paris</option><option label="(UTC+01:00) West Central Africa" value="string:Africa/Lagos">(UTC+01:00) West Central Africa</option><option label="(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna" value="string:Europe/Berlin" selected="selected">(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option><option label="(UTC+01:00) Windhoek" value="string:Africa/Windhoek">(UTC+01:00) Windhoek</option><option label="(UTC+03:00) Minsk" value="string:Europe/Minsk">(UTC+03:00) Minsk</option><option label="(UTC+02:00) Cairo" value="string:Africa/Cairo">(UTC+02:00) Cairo</option><option label="(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius" value="string:Europe/Kiev">(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option><option label="(UTC+02:00) Athens, Bucharest" value="string:Europe/Bucharest">(UTC+02:00) Athens, Bucharest</option><option label="(UTC+02:00) Jerusalem" value="string:Asia/Jerusalem">(UTC+02:00) Jerusalem</option><option label="(UTC+02:00) Amman" value="string:Asia/Amman">(UTC+02:00) Amman</option><option label="(UTC+02:00) Beirut" value="string:Asia/Beirut">(UTC+02:00) Beirut</option><option label="(UTC+02:00) Harare, Pretoria" value="string:Africa/Johannesburg">(UTC+02:00) Harare, Pretoria</option><option label="(UTC+02:00) Damascus" value="string:Asia/Damascus">(UTC+02:00) Damascus</option><option label="(UTC+02:00) Istanbul" value="string:Europe/Istanbul">(UTC+02:00) Istanbul</option><option label="(UTC+03:00) Kuwait, Riyadh" value="string:Asia/Riyadh">(UTC+03:00) Kuwait, Riyadh</option><option label="(UTC+03:00) Baghdad" value="string:Asia/Baghdad">(UTC+03:00) Baghdad</option><option label="(UTC+03:00) Nairobi" value="string:Africa/Nairobi">(UTC+03:00) Nairobi</option><option label="(UTC+02:00) Kaliningrad" value="string:Europe/Kaliningrad">(UTC+02:00) Kaliningrad</option><option label="(UTC+03:30) Tehran" value="string:Asia/Tehran">(UTC+03:30) Tehran</option><option label="(UTC+03:00) Moscow, St. Petersburg, Volgograd" value="string:Europe/Moscow">(UTC+03:00) Moscow, St. Petersburg, Volgograd</option><option label="(UTC+04:00) Abu Dhabi, Muscat" value="string:Asia/Dubai">(UTC+04:00) Abu Dhabi, Muscat</option><option label="(UTC+04:00) Baku" value="string:Asia/Baku">(UTC+04:00) Baku</option><option label="(UTC+04:00) Yerevan" value="string:Asia/Yerevan">(UTC+04:00) Yerevan</option><option label="(UTC+04:00) Tbilisi" value="string:Asia/Tbilisi">(UTC+04:00) Tbilisi</option><option label="(UTC+04:00) Port Louis" value="string:Indian/Mauritius">(UTC+04:00) Port Louis</option><option label="(UTC+04:30) Kabul" value="string:Asia/Kabul">(UTC+04:30) Kabul</option><option label="(UTC+05:00) Tashkent" value="string:Asia/Tashkent">(UTC+05:00) Tashkent</option><option label="(UTC+05:00) Islamabad, Karachi" value="string:Asia/Karachi">(UTC+05:00) Islamabad, Karachi</option><option label="(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi" value="string:Asia/Calcutta">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option><option label="(UTC+05:30) Sri Jayawardenepura" value="string:Asia/Colombo">(UTC+05:30) Sri Jayawardenepura</option><option label="(UTC+05:45) Kathmandu" value="string:Asia/Katmandu">(UTC+05:45) Kathmandu</option><option label="(UTC+05:00) Ekaterinburg" value="string:Asia/Yekaterinburg">(UTC+05:00) Ekaterinburg</option><option label="(UTC+06:00) Astana" value="string:Asia/Almaty">(UTC+06:00) Astana</option><option label="(UTC+06:00) Dhaka" value="string:Asia/Dhaka">(UTC+06:00) Dhaka</option><option label="(UTC+06:30) Yangon (Rangoon)" value="string:Asia/Rangoon">(UTC+06:30) Yangon (Rangoon)</option><option label="(UTC+06:00) Novosibirsk" value="string:Asia/Novosibirsk">(UTC+06:00) Novosibirsk</option><option label="(UTC+07:00) Bangkok, Hanoi, Jakarta" value="string:Asia/Bangkok">(UTC+07:00) Bangkok, Hanoi, Jakarta</option><option label="(UTC+07:00) Krasnoyarsk" value="string:Asia/Krasnoyarsk">(UTC+07:00) Krasnoyarsk</option><option label="(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi" value="string:Asia/Shanghai">(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option><option label="(UTC+08:00) Kuala Lumpur, Singapore" value="string:Asia/Singapore">(UTC+08:00) Kuala Lumpur, Singapore</option><option label="(UTC+08:00) Taipei" value="string:Asia/Taipei">(UTC+08:00) Taipei</option><option label="(UTC+08:00) Perth" value="string:Australia/Perth">(UTC+08:00) Perth</option><option label="(UTC+08:00) Ulaanbaatar" value="string:Asia/Ulaanbaatar">(UTC+08:00) Ulaanbaatar</option><option label="(UTC+08:00) Irkutsk" value="string:Asia/Irkutsk">(UTC+08:00) Irkutsk</option><option label="(UTC+09:00) Seoul" value="string:Asia/Seoul">(UTC+09:00) Seoul</option><option label="(UTC+09:00) Osaka, Sapporo, Tokyo" value="string:Asia/Tokyo">(UTC+09:00) Osaka, Sapporo, Tokyo</option><option label="(UTC+09:30) Darwin" value="string:Australia/Darwin">(UTC+09:30) Darwin</option><option label="(UTC+09:30) Adelaide" value="string:Australia/Adelaide">(UTC+09:30) Adelaide</option><option label="(UTC+09:00) Yakutsk" value="string:Asia/Yakutsk">(UTC+09:00) Yakutsk</option><option label="(UTC+10:00) Canberra, Melbourne, Sydney" value="string:Australia/Sydney">(UTC+10:00) Canberra, Melbourne, Sydney</option><option label="(UTC+10:00) Brisbane" value="string:Australia/Brisbane">(UTC+10:00) Brisbane</option><option label="(UTC+10:00) Hobart" value="string:Australia/Hobart">(UTC+10:00) Hobart
                                                                    </option><option label="(UTC+10:00) Guam, Port Moresby" value="string:Pacific/Port_Moresby">(UTC+10:00) Guam, Port Moresby</option><option label="(UTC+10:00) Vladivostok" value="string:Asia/Vladivostok">(UTC+10:00) Vladivostok</option><option label="(UTC+11:00) Solomon Is., New Caledonia" value="string:Pacific/Guadalcanal">(UTC+11:00) Solomon Is., New Caledonia</option><option label="(UTC+10:00) Magadan" value="string:Asia/Magadan">(UTC+10:00) Magadan</option><option label="(UTC+12:00) Fiji" value="string:Pacific/Fiji">(UTC+12:00) Fiji</option><option label="(UTC+12:00) Auckland, Wellington" value="string:Pacific/Auckland">(UTC+12:00) Auckland, Wellington</option><option label="(UTC+12:00) Coordinated Universal Time +12" value="string:Etc/GMT-12">(UTC+12:00) Coordinated Universal Time +12</option><option label="(UTC+13:00) Nuku'alofa" value="string:Pacific/Tongatapu">(UTC+13:00) Nuku'alofa</option><option label="(UTC+13:00) Samoa" value="string:Pacific/Samoa">(UTC+13:00) Samoa</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="website">Langue de l'interface utilisateur</label>
                                                                <select class="form-control">
                                                                    <option>Option 1</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 1</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="facturePIll" role="tabpanel" aria-labelledby="profile-icon-pill">
                                    facture
                                </div>
                                <div class="tab-pane fade" id="paimentPIll" role="tabpanel" aria-labelledby="contact-icon-pill">
                                    paiment
                                </div>
                                <div class="tab-pane fade" id="fedilitePIll" role="tabpanel" aria-labelledby="contact-icon-pill">
                                    fedilite
                                </div>
                                <div class="tab-pane fade" id="impotPIll" role="tabpanel" aria-labelledby="contact-icon-pill">
                                    impot
                                </div>
                                <div class="tab-pane fade" id="pdfPIll" role="tabpanel" aria-labelledby="contact-icon-pill">
                                    pdf
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

            </div>
			
</div>