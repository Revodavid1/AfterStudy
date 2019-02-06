<script>
    $(document).ready(function(){
        $('.tabs').tabs();
        $('.slider').slider();
        $('.datepicker').datepicker();
    });
</script>

<div class="row" style="margin-top:10px">
    <div class="col s6">
        <div class="slider">
            <ul class="slides">
            <li>
                <img src="webroot/img/projectshare.jpg">
                <div class="caption center-align">
                <h3 class="deep-orange-text">Projects</h3>
                <h5 class="light white-text text-darken-3">Collaborate on Projects with others</h5>
                </div>
            </li>
            <li>
                <img src="webroot/img/events.jpg"> <!-- random image -->
                <div class="caption left-align">
                <h3>Events</h3>
                <h5 class="light grey-text text-lighten-3">Share Events and Socialize</h5>
                </div>
            </li>
            <li>
                <img src="webroot/img/qa.jpg"> <!-- random image -->
                <div class="caption right-align">
                <h3>QA Forum</h3>
                <h5 class="light grey-text text-lighten-3">Discuss Questions and Review Answers</h5>
                </div>
            </li>
            </ul>
        </div>
    </div> 

    <div class="col s6">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6"><a class="active black-text" href="#login">Login</a></li>
                    <li class="tab col s6"><a  href="#register" class="black-text">Register</a></li>
                </ul>
            </div>
        <div id="login" class="col s12">
            <div class="center">
                <div class="card">
                    <div class="card-content container">
                        <span class="card-title black-text">Log in to AfterStudy</span>
                        <?= $this->Form->create() ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <?= $this->Form->control(('email'),['class' => 'validate'],['type' => 'email'],
                                    ['id' => 'user_email'])?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <?= $this->Form->control(('password'),['class' => 'validate'],['type' => 'password'],
                                    ['id' => 'user_password'])?>
                            </div>
                        </div>
                        <div>
                            <?= $this->Form->button(('Submit'),['class' => 'btn waves-effect black white-text 
                                waves-light'],['type' => 'submit'],['name' => 'submit_btn'])?>
                        </div> 
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="register" class="col s12">
        <div class="center">
            <div class="card">
                <div class="card-content">
                    <form>
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Full Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Phone</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <label for="major">Major</label>
                                <select id="major" class="browser-default">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                            </div>
                            <div class="col s6">
                                <label for="class_standing">Class Standing</label>
                                <select id="class_standing" class="browser-default">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="Freshman">Freshman</option>
                                    <option value="Sophomore">Sophomore</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Senior">Senior</option>
                                    <option value="Graduate">Graduate</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">email</i>
                                <input id="icon_email" type="text">
                                <label for="icon_email">email id</label>
                            </div>
                            <div class="col s6">
                                <label for="email_ext">domain</label>
                                <select id="email_ext" class="browser-default">
                                    <option value="@wildcats.unh.edu" selected>@wildcats.unh.edu</option>
                                    <option value="@unh.edu">@unh.edu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">cake</i>
                                <input type="text" id="date_of_birth" class="datepicker">
                                <label for="date_of_birth">Date of Birth</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <label for="residential_status">Residential Status</label>
                                <select id="residential_status" class="browser-default">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="In-State">In-State</option>
                                    <option value="Out-of-State">Out-of-State</option>
                                    <option value="International">International</option>
                                </select>
                            </div>
                            <div class="col s6">
                                <label for="country_of_origin">Country of Origin</label>
                                <select id="country_of_origin" class="browser-default">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="Nigeria">Nigeria</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <label for="state_of_residence">State of Residence</label>
                                <select id="state_of_residence" class="browser-default">
                                    <option value="" disabled selected>-- Select --</option>
                                    <option value="NH">NH</option>
                                </select>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">location_on</i>
                                <input id="zip_code" type="text" class="validate">
                                <label for="zip_code">Zip Code</label>
                            </div>
                        </div>
                        <div>
                            <button class="btn waves-effect black white-text waves-light" type="submit" 
                            name="submit_btn">Submit</button>
                        </div> 
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
          