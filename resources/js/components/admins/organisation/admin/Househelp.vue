<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
    <div class="col-md-12">
     <section class="content">
      <div class="row justify-content-around">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Househelps And Their Next of Kins Table</h3>
              <div class="card-tools">
                    <button class="btn btn-success"  @click.prevent="newHousehelpModal()">Add New Househelp and Their Next of Kins                         <i class="fas fa-plus fw"></i>
                     </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S1</th>
                    <th>Househelp Details</th>
                    <th>Househelp Next of Kin Details</th>
                    <th style="padding-left: 14px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(househelp, index) in Househelps" :key="househelp.id">
                    <td >{{index+1}}</td>
                    <td >
                        <div class="row">
                            <div style="padding: 3px;max-width:250px">
                                 <img class="card-img-top" :src="househelpLoadLogo(househelp.logo)" style="width:170px" alt="Card image cap">
                            </div>
                            <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;padding-left: 10px;
                                        font-style: italic ">
                                <div>{{househelp.name}},</div>
                                <div> Phone: ,<span style="color:#9a009a;">{{househelp.phone}}</span>,
                                    Landline: <span style="color:#9a009a;">{{househelp.landline}},</span>
                                </div>
                                <div>
                                     Mail: <span style="color:#9a009a;">{{househelp.househelp_email}},</span>
                                </div>
                                    <div>P. O. Box , <span style="color:#9a009a;">{{househelp.address}}</span>,
                                    </div>
                                <div>
                                    <span style="color:#9a009a;">{{househelp.ward.name}}</span> ward,
                                    <span style="color:#9a009a;">{{househelp.constituency.name}}</span> constituency,
                                </div>
                                <div>
                                    <span style="color:#9a009a;">{{househelp.county.name}}</span> county,
                                    <span style="color:#9a009a;">{{househelp.country.name}}, </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;padding-left: 10px;
                                        font-style: italic ">
                                <div>{{househelpkin.name}},</div>
                                <div> Phone: ,<span style="color:#9a009a;">{{househelpkin.phone}}</span>,
                                    Landline: <span style="color:#9a009a;">{{househelpkin.landline}},</span>
                                </div>
                                <div>
                                     Mail: <span style="color:#9a009a;">{{househelpkin.househelpkin_email}},</span>
                                </div>
                                    <div>P. O. Box , <span style="color:#9a009a;">{{househelpkin.address}}</span>,
                                    </div>
                                <div>
                                    <span style="color:#9a009a;">{{househelpkin.ward.name}}</span> ward,
                                    <span style="color:#9a009a;">{{househelpkin.constituency.name}}</span> constituency,
                                </div>
                                <div>
                                    <span style="color:#9a009a;">{{househelpkin.county.name}}</span> county,
                                    <span style="color:#9a009a;">{{househelpkin.country.name}}, </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 3px;" >
                        <div class="clearfix" style="font-weight:bold;font-size:0.7em;">
                            <span class="float-left" style="margin-bottom:-0.5em" >
                                <div style="margin-bottom:0.25em"> Updated at:
                                    <span style="color:#9a009a;">{{househelp.created_at | dateformat}} </span>
                                </div>
                            </span>
                            <span class="float-right">
                                <router-link  :to="`/househelp/${househelp.id}`">
                                        <i class="fa fa-eye "></i>
                                </router-link>
                                <a href=""  @click.prevent="deleteHousehelp(househelp.id)">
                                    <i class="fa fa-trash red"></i>
                                </a>
                            </span>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>


    </div>
        <!-- Role Modal -->

 <div class="modal fade " id="BureauModal" tabindex="-1" role="dialog" aria-labelledby="BureauModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4> Househelp Demographic data</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form-wizard role="form" @on-complete="editmodeBureau ? updateBureau(bureauform.id) : addBureau ()" >
                            <h5 class="modal-title" v-show="editmodeBureau" id="BureauModalLabel">Update Bureau & Director</h5>
                            <h5 class="modal-title" v-show="!editmodeBureau" id="BureauModalLabel">Add New Bureau & Director</h5>


                            <tab-content title="Househelp Househelp Info" :before-change="newHousehelp ? validateHousehelp : validateHousehelpUpdate ">
                                      <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="househelp_first_name" class="col-form-label"> Househelp First Name</label>
                                            <input v-model="househelpform.househelp_first_name" type="text" name="first_name" placeholder="Househelp First Name"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_first_name') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelp_last_name" class=" col-form-label">househelp_Last Name </label>
                                            <input v-model="househelpform.househelp_last_name" type="househelp_last_name" name="househelp_last_name" placeholder="househelp_Last Name"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_last_name') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="househelpform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <input v-model="househelpform.househelp_password" type="password" id="househelp_password" placeholder="Househelp Password"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_password') }">
                                            <has-error :form="househelpform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelp_age" class="col-form-label">Househelp Age</label>
                                            <input v-model="househelpform.househelp_age" type="text" name="househelp_id_no" placeholder="Househelp age"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_age') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_age"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelp_address" class=" col-form-label">Househelp Address</label>
                                            <input v-model="househelpform.househelp_address" type="text" name="Address" placeholder="Househelp Address"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_address') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_address"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                         <div class="form-group col-md-4">
                                            <label for="househelp_gender_id">Select Gender</label>
                                            <select class="form-control" v-model="househelpform.househelp_gender_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_gender_id') }">
                                                    <option disabled value="">Select gender</option>
                                                    <option v-for="gender in Genders" :value="gender.id" :key="gender.id">{{gender.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_gender_id"></has-error>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="househelp_phone" class="col-form-label"> Househelp Phone</label>
                                                <div>
                                                    <vue-tel-input v-model="househelpform.househelp_phone" name="househelp_phone" @onInput="HousehelpInputPhone"
                                                    class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_phone') }">
                                                    </vue-tel-input>
                                                    <has-error style="color: #e83e8c" :form="househelpform" field="househelp_phone"></has-error>
                                                </div>
                                                <div v-if="househelpform.househelp_phone" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{househelp_phone1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{househelp_phone1.country}}</strong></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelp_landline" class=" col-form-label">Househelp Landline</label>
                                                <vue-tel-input v-model="househelpform.househelp_landline" name="househelp_landline" @onInput="HousehelpInputLandline"
                                                    class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelp_landline') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_landline"></has-error>

                                                <div v-if="househelpform.househelp_landline" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{househelp_landline1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{househelp_landline1.country}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="househelp_country_id">Select Country</label>
                                            <select class="form-control" @change="HousehelpcountryCounties(househelpform.househelp_country_id)"
                                            v-model="househelpform.househelp_country_id" :class="{ 'is-invalid': househelpform.errors.has('househelp_country_id') }">
                                                    <option disabled value="">Select Country</option>
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="HousehelpcountyConstituencies(househelpform.househelp_county_id)"
                                            v-model="househelpform.househelp_county_id" :class="{ 'is-invalid': househelpform.errors.has('househelp_county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="HousehelpconstituencyWards(househelpform.househelp_constituency_id)"
                                            v-model="househelpform.househelp_constituency_id" :class="{ 'is-invalid': househelpform.errors.has('househelp_constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="househelpform.househelp_ward_id" :class="{ 'is-invalid': househelpform.errors.has('househelp_ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelp_ward_id"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="househelp_passport_image" class=" col-form-label">Househelp PassPort Image</label><br>
                                                <input @change="househelpChangePImage($event)" type="file" name="househelp_passport_image"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_passport_image') }">
                                                    <img v-show="editmodeHousehelp" :src="updateHousehelpPImage(househelpform.househelp_passport_image)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelp" :src="househelpform.househelp_passport_image" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_passport_image"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="frontside_househelp_id_photo" class=" col-form-label">Househelp FrontSide ID Photo</label><br>
                                                <input @change="househelpChangeFIDPhoto($event)" type="file" name="frontside_househelp_id_photo"
                                                    :class="{ 'is-invalid': househelpform.errors.has('frontside_househelp_id_photo') }">
                                                    <img v-show="editmodeHousehelp" :src="updateHousehelpFIDPhoto(househelpform.frontside_househelp_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelp" :src="househelpform.frontside_househelp_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="frontside_househelp_id_photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_househelp_i_photod" class=" col-form-label">Househelp BackSide ID Photo</label><br>
                                                <input @change="househelpChangeBIDPhoto($event)" type="file" name="backside_househelp_id_photo"
                                                    :class="{ 'is-invalid': househelpform.errors.has('backside_househelp_id') }">
                                                    <img v-show="editmodeHousehelp" :src="updateHousehelpBIDPhoto(househelpform.backside_househelp_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelp" :src="househelpform.backside_househelp_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="backside_househelp_id_photo"></has-error>
                                        </div>
                                    </div>
                            </tab-content>
                            <tab-content title="Househelp Features Info" :before-change="newHousehelp ? validateHousehelp : validateHousehelpUpdate ">

                                    <div class=" row">
                                         <div class="form-group col-md-3">
                                            <label for="househelp_education_id">Select Education Level</label>
                                            <select class="form-control" v-model="househelpform.househelp_education_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_education_id') }">
                                                    <option disabled value="">Select education</option>
                                                    <option v-for="education in Educations" :value="education.id" :key="education.id">{{education.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_education_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_experience_id">Select Experience</label>
                                            <select class="form-control" v-model="househelpform.househelp_experience_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_experience_id') }">
                                                    <option disabled value="">Select experience</option>
                                                    <option v-for="experience in Experiences" :value="experience.id" :key="experience.id">{{experience.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_experience_id"></has-error>
                                        </div>
                                         <div class="form-group col-md-3">
                                            <label for="househelp_maritalstatus_id">Select Maritalstatus</label>
                                            <select class="form-control" v-model="househelpform.househelp_maritalstatus_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_maritalstatus_id') }">
                                                    <option disabled value="">Select maritalstatus</option>
                                                    <option v-for="maritalstatus in Maritalstatuses" :value="maritalstatus.id" :key="maritalstatus.id">{{maritalstatus.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_maritalstatus_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_tribe_id">Select Tribe</label>
                                            <select class="form-control" v-model="househelpform.househelp_tribe_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_tribe_id') }">
                                                    <option disabled value="">Select tribe</option>
                                                    <option v-for="tribe in Tribes" :value="tribe.id" :key="tribe.id">{{tribe.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_tribe_id"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                         <div class="form-group col-md-3">
                                            <label for="househelp_skill_id">Select Skill Level</label>
                                            <select class="form-control" v-model="househelpform.househelp_skill_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_skill_id') }">
                                                    <option disabled value="">Select skill</option>
                                                    <option v-for="skill in Skills" :value="skill.id" :key="skill.id">{{skill.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_skill_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_operation_id">Select Operation</label>
                                            <select class="form-control" v-model="househelpform.househelp_operation_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_operation_id') }">
                                                    <option disabled value="">Select operation</option>
                                                    <option v-for="operation in Operations" :value="operation.id" :key="operation.id">{{operation.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_operation_id"></has-error>
                                        </div>
                                         <div class="form-group col-md-3">
                                            <label for="househelp_duration_id">Select Duration</label>
                                            <select class="form-control" v-model="househelpform.househelp_duration_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_duration_id') }">
                                                    <option disabled value="">Select duration</option>
                                                    <option v-for="duration in Durations" :value="duration.id" :key="duration.id">{{duration.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_duration_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_englishstatus_id">Select Englishstatus</label>
                                            <select class="form-control" v-model="househelpform.househelp_englishstatus_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_englishstatus_id') }">
                                                    <option disabled value="">Select englishstatus</option>
                                                    <option v-for="englishstatus in Englishstatuses" :value="englishstatus.id" :key="englishstatus.id">{{englishstatus.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_englishstatus_id"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="househelp_religion_id">Select Religion Level</label>
                                            <select class="form-control" v-model="househelpform.househelp_religion_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_religion_id') }">
                                                    <option disabled value="">Select religion</option>
                                                    <option v-for="religion in Religions" :value="religion.id" :key="religion.id">{{religion.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_religion_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelp_kid_id">Select Kid Level</label>
                                            <select class="form-control" v-model="househelpform.househelp_kid_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelp_kid_id') }">
                                                    <option disabled value="">Select kid</option>
                                                    <option v-for="kid in Kids" :value="kid.id" :key="kid.id">{{kid.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelp_kid_id"></has-error>
                                        </div>
                                    </div>
                            </tab-content>
                            <tab-content title="Househelpkin Househelpkin Info" :before-change="newHousehelpkin ? validateHousehelpkin : validateHousehelpkinUpdate ">
                                      <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_first_name" class="col-form-label"> Househelpkin First Name</label>
                                            <input v-model="househelpform.househelpkin_first_name" type="text" name="first_name" placeholder="Househelpkin First Name"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_first_name') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_last_name" class=" col-form-label">househelpkin_Last Name </label>
                                            <input v-model="househelpform.househelpkin_last_name" type="househelpkin_last_name" name="househelpkin_last_name" placeholder="househelpkin_Last Name"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_last_name') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="househelpform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <input v-model="househelpform.househelpkin_password" type="password" id="househelpkin_password" placeholder="Househelpkin Password"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_password') }">
                                            <has-error :form="househelpform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_id_no" class="col-form-label">Househelpkin ID no.</label>
                                            <input v-model="househelpform.househelpkin_id_no" type="text" name="househelpkin_id_no" placeholder="Househelpkin ID NO"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_id_no') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_id_no"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_address" class=" col-form-label">Househelpkin Address</label>
                                            <input v-model="househelpform.househelpkin_address" type="text" name="Address" placeholder="Househelpkin Address"
                                                class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_address') }" >
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_address"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                         <div class="form-group col-md-3">
                                            <label for="househelpkin_gender_id">Select Gender</label>
                                            <select class="form-control" v-model="househelpform.househelpkin_gender_id"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelpkin_gender_id') }">
                                                    <option disabled value="">Select gender</option>
                                                    <option v-for="gender in Genders" :value="gender.id" :key="gender.id">{{gender.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_gender_id"></has-error>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_phone" class="col-form-label"> Househelpkin Phone</label>
                                                <div>
                                                    <vue-tel-input v-model="househelpform.househelpkin_phone" name="househelpkin_phone" @onInput="HousehelpkinInputPhone"
                                                    class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_phone') }">
                                                    </vue-tel-input>
                                                    <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_phone"></has-error>
                                                </div>
                                                <div v-if="househelpform.househelpkin_phone" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{househelpkin_phone1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{househelpkin_phone1.country}}</strong></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_landline" class=" col-form-label">Househelpkin Landline</label>
                                                <vue-tel-input v-model="househelpform.househelpkin_landline" name="househelpkin_landline" @onInput="HousehelpkinInputLandline"
                                                    class="form-control" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_landline') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_landline"></has-error>

                                                <div v-if="househelpform.househelpkin_landline" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{househelpkin_landline1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{househelpkin_landline1.country}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="househelpkin_country_id">Select Country</label>
                                            <select class="form-control" @change="HousehelpkincountryCounties(househelpform.househelpkin_country_id)"
                                            v-model="househelpform.househelpkin_country_id" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_country_id') }">
                                                    <option disabled value="">Select Country</option>
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelpkin_county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="HousehelpkincountyConstituencies(househelpform.househelpkin_county_id)"
                                            v-model="househelpform.househelpkin_county_id" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelpkin_constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="HousehelpkinconstituencyWards(househelpform.househelpkin_constituency_id)"
                                            v-model="househelpform.househelpkin_constituency_id" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="househelpkin_ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="househelpform.househelpkin_ward_id" :class="{ 'is-invalid': househelpform.errors.has('househelpkin_ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_ward_id"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="househelpkin_passport_image" class=" col-form-label">Househelpkin PassPort Image</label><br>
                                                <input @change="househelpkinChangePImage($event)" type="file" name="househelpkin_passport_image"
                                                    :class="{ 'is-invalid': househelpform.errors.has('househelpkin_passport_image') }">
                                                    <img v-show="editmodeHousehelpkin" :src="updateHousehelpkinPImage(househelpform.househelpkin_passport_image)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelpkin" :src="househelpform.househelpkin_passport_image" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="househelpkin_passport_image"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="frontside_househelpkin_id_photo" class=" col-form-label">Househelpkin FrontSide ID Photo</label><br>
                                                <input @change="househelpkinChangeFIDPhoto($event)" type="file" name="frontside_househelpkin_id_photo"
                                                    :class="{ 'is-invalid': househelpform.errors.has('frontside_househelpkin_id_photo') }">
                                                    <img v-show="editmodeHousehelpkin" :src="updateHousehelpkinFIDPhoto(househelpform.frontside_househelpkin_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelpkin" :src="househelpform.frontside_househelpkin_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="frontside_househelpkin_id_photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_househelpkin_i_photod" class=" col-form-label">Househelpkin BackSide ID Photo</label><br>
                                                <input @change="househelpkinChangeBIDPhoto($event)" type="file" name="backside_househelpkin_id_photo"
                                                    :class="{ 'is-invalid': househelpform.errors.has('backside_househelpkin_id') }">
                                                    <img v-show="editmodeHousehelpkin" :src="updateHousehelpkinBIDPhoto(househelpform.backside_househelpkin_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeHousehelpkin" :src="househelpform.backside_househelpkin_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="househelpform" field="backside_househelpkin_id_photo"></has-error>
                                        </div>
                                    </div>
                            </tab-content>
                        </form-wizard>
                    </div>
                </div>
            </div>
    </div>




  </div>
</template>

<script>

    export default {
        name:"SingleBureau",
        data(){
            return{
                newBureauDirector: false,
                editmodeBureau: false,
                bureauOutput:'',//view form data and confirm if is ok before submit
                bureauform: new Form({
                        id:'',
                        name:'',
                        bureau_email:'',
                        phone:'',
                        landline:'',
                        website:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                        logo:'',
                }),
                 newDirector: false,
                editmodeHousehelp: false,
                househelpform: new Form({
                        id:'',
                        househelp_first_name:'',
                        househelp_last_name:'',
                        househelp_email:'',
                        househelp_password:'',
                        househelp_user_type:'',
                        permissions:[],
                        roles:[],
                        househelp_user_id:'',
                        househelp_bureau_id:'',
                        househelp_age:'',

                        househelp_photo:'',
                        househelp_id_photo_front:'',
                        househelp_id_photo_back:'',
                        househelp_about_me:'',
                        househelp_phone:'',
                        househelp_address:'',
                        househelp_country_id:'',
                        househelp_county_id:'',
                        househelp_constituency_id:'',
                        househelp_ward_id:'',
                        //extra
                        househelp_id_no:'',
                        education_id:'',
                        experience_id:'',
                        maritalstatus_id:'',
                        tribe_id:'',
                        skill_id:'',
                        operation_id:'',
                        duration_id:'',
                        englishstatus_id:'',
                        religion_id:'',
                        kid_id:'',
                        //id status
                        id_status:'',
                        id_number:'',
                        ref_number:'',
                        id_photo_front:'',
                        id_photo_back:'',
                        //health status
                        health_status:'',
                        specify:'',

                        //househelp
                        househelpkin_first_name:'',
                        househelpkin_last_name:'',
                        househelpkin_email:'',
                        househelpkin_password:'',
                        househelpkin_user_type:'',

                        househelpkin_user_id:'',
                        househelpkin_househelp_id:'',
                        houshelpkin_relationship_id:'',

                        househelpkin_id_no:'',
                        househelpkin_photo:'',
                        househelpkin_id_photo_front:'',
                        househelpkin_id_photo_back:'',
                        househelpkin_phone:'',
                        househelpkin_address:'',
                        househelpkin_country_id:'',
                        househelpkin_county_id:'',
                        househelpkin_constituency_id:'',
                        househelpkin_ward_id:'',

                }),

                 //organisation
                phone1:{
                        isValid: false,
                        country: undefined,
                },
                landline1:{
                        isValid: false,
                        country: undefined,
                },
                 //director
                phone2:{
                        isValid: false,
                        country: undefined,
                },
                landline2:{
                        isValid: false,
                        country: undefined,
                },
                //admin
                phone3:{
                        isValid: false,
                        country: undefined,
                },
                landline3:{
                        isValid: false,
                        country: undefined,
                },
                  //employee
                phone4:{
                        isValid: false,
                        country: undefined,
                },
                landline4:{
                        isValid: false,
                        country: undefined,
                },
            }
        },
        mounted() {
            this.loadCountries();
            this.loadCounties();
            this.loadConstituencies();///linked to methods and actions store
            this.loadWards();///linked to methods and actions store
            this.singlebureau();
        },
        computed:{
            Countries(){
                return this.$store.getters.Countries
            },
            Counties(){
               return this.$store.getters.CountryCounties
            },
            Constituencies(){
               return this.$store.getters.CountyConstituencies
            },
            Wards(){
               return this.$store.getters.ConstituencyWards
            },
            Bureau(){
                console.log(this.$store.getters.Bureau)
               return this.$store.getters.Bureau//single Bureau by parameter id
            },
            Director(){
                console.log(this.$store.getters.BureauDirector)
               return this.$store.getters.BureauDirector//View Single Bureau director  by parameter id
            },
            Admin(){
                console.log(this.$store.getters.BureauAdmin)
               return this.$store.getters.BureauAdmin//View Single Bureau  admin by parameter id
            },
            Employee(){
                console.log(this.$store.getters.BureauEmployee)
               return this.$store.getters.BureauEmployee//View Single Bureau  admin by parameter id
            },
            // Househelp(){
            //     console.log(this.$store.getters.BureauHousehelp)
            //    return this.$store.getters.BureauHousehelps//View Single Bureau houshelp  by parameter id with their kins
            // },
            // CLient(){
            //     console.log(this.$store.getters.BureauClient)
            //    return this.$store.getters.BureauClient//View Single Bureau client  by parameter id
            // },
        },
        methods:{
            singlebureau(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('BureauById', this.$route.params.id);   //action from index.js
                    },

            // phone and landline
            //Bureau
            BureauInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.phone = number;
            this.phone1.isValid = isValid;
            this.phone1.country = country && country.name;
            },
            BureauInputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.landline = number;
            this.landline1.isValid = isValid;
            this.landline1.country = country && country.name;
            },


            //Director
            DirectorInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.directorform.phone = number;
            this.phone2.isValid = isValid;
            this.phone2.country = country && country.name;
            },
            DirectorInputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.directorform.landline = number;
            this.landline2.isValid = isValid;
            this.landline2.country = country && country.name;
            },
                        //Admin
            AdminInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.adminform.phone = number;
            this.phone3.isValid = isValid;
            this.phone3.country = country && country.name;
            },
            AdminInputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.adminform.landline = number;
            this.landline3.isValid = isValid;
            this.landline3.country = country && country.name;
            },
 //Employee
            EmployeeInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.employeeform.phone = number;
            this.phone4.isValid = isValid;
            this.phone4.country = country && country.name;
            },
            EmployeeInputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.employeeform.landline = number;
            this.landline4.isValid = isValid;
            this.landline4.country = country && country.name;
            },

            loadCountries(){
                return this.$store.dispatch( "countries")//get all from roles.index
            },
            loadCounties(){
                return this.$store.dispatch( "countrycounties")//get all from counties.index
            },
            loadConstituencies(){
                return this.$store.dispatch( "countyconstituencies")//get all from counties.index
            },
            loadWards(){
                return this.$store.dispatch( "constituencywards")//get all from towns.index
            },
            loadBureau(){
                return this.$store.dispatch( "bureaus")//get all from bureau. bureau linked to user
            },

            //Bureau
            validateBureau() {
                this.$Progress.start()
                return this.bureauform.post('/bureau/verify/info')
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Bureau Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Bureau Info failed Verification.'
                        })
                    })
            },

            //Bureau verification
            validateBureauUpdate() {
                let id = this.bureauform.id;
                console.log('first',id);
                this.$Progress.start()
                return this.bureauform.patch('/bureau/updateverify/info/'+id)
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Bureau update Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Bureau update Info failed Verification.'
                        })
                    })
            },

            countryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            countyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            constituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            bureauChangeLogo(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.bureauform.logo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            bureauLoadLogo(logo_id){
                 if(logo_id){
                    return "assets/bureau/img/logo/"+logo_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateBureauLogo(bureauformlogo){
                console.log(bureauformlogo)
                let img = this.bureauform.logo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.bureauform.logo;
                        }else{
                            if(bureauformlogo){
                                return "assets/bureau/img/logo/"+bureauformlogo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            editBureauModal(id){

                 this.editmodeBureau = true;
                 this.bureauform.reset()
                   console.log('edit bureauanisaton', id)
                    this.$Progress.start();
                      axios.get('/bureau/edit/'+id)
                        .then((response)=>{
                           $('#BureauModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Bureau data successfully'
                            })
                            this.bureauform.fill(response.data.bureau);
                            //get country id
                            this.bureauform.country_id = response.data.bureau.country.id;
                            //get county id using the country id
                            this.bureauform.county_id = response.data.bureau.county.id
                            this.$store.dispatch('countrycounties', response.data.bureau.country.id);
                            //get contituency using county id
                            this.bureauform.constituency_id = response.data.bureau.constituency.id
                            this.$store.dispatch('countyconstituencies', response.data.bureau.county.id);
                            //get ward usng constituency id
                            this.bureauform.ward_id = response.data.bureau.ward.id
                            this.$store.dispatch('constituencywards', response.data.bureau.constituency.id);

                            this.$Progress.finish();

                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#BureauModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },

            updateBureau(id){
                  console.log('update bureauanisaton')
                  this.$Progress.start();
                     this.bureauform.patch('/bureau/update/'+id)
                        .then(()=>{
                            this.$store.dispatch('BureauById', this.$route.params.id);
                         $('#BureauModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'User Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            $('#BureauModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },

            DirectorcountryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            DirectorcountyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            DirectorconstituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            newDirectorModal(bureau_id){
                console.log(bureau_id)
                 this.editmodeDirector= false;
                 this.directorform.reset()
                 this.directorform.bureau_id;
                     $('#DirectorModal').modal('show')
            },
            //bureau director passposrt image
            directorLoadPassPhoto(directorpivot_photo){
                if(directorpivot_photo){
                    return "/assets/bureau/img/directors/passports/"+directorpivot_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            //director passport photo
            directorChangePassPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorPassPhoto(directorform_bureaudirector_photo){
                // console.log(directorform_bureaudirector_photo)
                let img = this.directorform.photo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.directorform.photo;
                        }else{
                            if(directorform_bureaudirector_photo){
                                return "assets/bureau/img/directors/passports/"+directorform_bureaudirector_photo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            directorLoadIDFrontPhoto(directorpivot_id_photo_front){
                if(directorpivot_id_photo_front){
                    return "/assets/bureau/img/directors/IDs/front/"+directorpivot_id_photo_front;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            directorChangeIDFrontPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorIDFrontPhoto(directorform_id_photo_front){
                let img = this.directorform.id_photo_front;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.directorform.id_photo_front;
                        }else{
                            if(directorform_id_photo_front){
                                return "assets/bureau/img/directors/IDs/front/"+directorform_id_photo_front;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            directorLoadIDBackPhoto(directorform_id_photo_back){
                if(directorform_id_photo_back){
                    return "/assets/bureau/img/directors/IDs/back/"+directorform_id_photo_back;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            directorChangeIDBackPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorIDBackPhoto(directorform_id_photo_back){
                let img = this.directorform.id_photo_back;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.directorform.id_photo_back;
                        }else{
                            if(directorform_id_photo_back){
                                return "assets/bureau/img/directors/IDs/back/"+directorform_id_photo_back;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            viewDirectorModal(id){
                console.log(id)
                this.$Progress.start();
                    //get bueau director by id
                this.$store.dispatch('BureauDirectorById', id)  //action from index.js
                    .then((response)=>{
                       $('#ViewDirectorModal').modal('show')
                       toast({
                        type: 'success',
                        title: 'Fetched the Bureau Director data successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        //errors
                        $('#ViewDirectorModal').modal('show');
                        toast({
                        type: 'error',
                        title: 'There was something Wrong Wheen feching data'
                        })
                    })
            },
            editDirectorModal(id){
                console.log(id)
                 this.editmodeDirector = true;
                 this.directorform.reset()
                    this.$Progress.start();
                      axios.get('/bureaudirector/edit/'+id)
                        .then((response)=>{
                           $('#DirectorModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Director data successfully'
                            })
                            console.log(response.data)
                            this.directorform.fill(response.data.director)
                            this.directorform.user_id = response.data.director.bureaudirectors[0].pivot.user_id
                            this.directorform.bureau_id = response.data.director.bureaudirectors[0].pivot.bureau_id
                            // // this.directorform.position_id = response.data.director.bureaudirectors[0].pivot.position_id
                            this.directorform.photo = response.data.director.bureaudirectors[0].pivot.photo
                            this.directorform.id_no = response.data.director.bureaudirectors[0].pivot.id_no
                            this.directorform.id_photo_front = response.data.director.bureaudirectors[0].pivot.id_photo_front
                            this.directorform.id_photo_back = response.data.director.bureaudirectors[0].pivot.id_photo_back
                            this.directorform.phone = response.data.director.bureaudirectors[0].pivot.phone
                            this.directorform.landline = response.data.director.bureaudirectors[0].pivot.landline
                            this.directorform.address = response.data.director.bureaudirectors[0].pivot.address

                        // //    //get country id
                            this.directorform.country_id = response.data.director.bureaudirectors[0].pivot.country_id
                            //get county id using the country id
                            this.directorform.county_id = response.data.director.bureaudirectors[0].pivot.county_id
                            this.$store.dispatch('countrycounties', response.data.director.bureaudirectors[0].pivot.country_id);
                            //get contituency using county id
                            this.directorform.constituency_id = response.data.director.bureaudirectors[0].pivot.constituency_id
                            this.$store.dispatch('countyconstituencies', response.data.director.bureaudirectors[0].pivot.county_id);
                            // //get ward usng constituency id
                            this.directorform.ward_id = response.data.director.bureaudirectors[0].pivot.ward_id
                            this.$store.dispatch('constituencywards', response.data.director.bureaudirectors[0].pivot.constituency_id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#DirectorModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            addDirector(Bureau_id) {
                // let bureau = this.$store.getters.Bureau[0];
                console.log(Bureau_id)
                this.$Progress.start();
                this.directorform.patch('/bureaudirector/'+Bureau_id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Director Created successfully'
                            })
                            this.$store.dispatch('BureauById', this.$route.params.id);
                            this.directorform.reset()
                            $('#DirectorModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#DirectorModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateDirector(id){
                  console.log(id)
                  console.log(+this.$route.params.id)
                  this.$Progress.start();
                     this.directorform.patch('/bureaudirector/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('BureauById', this.$route.params.id);
                         $('#DirectorModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Director Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteDirector(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete director', id)
                        this.$Progress.start();
                        this.directorform.get('/bureaudirector/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Director Deleted successfully'
                            })
                           this.$store.dispatch('BureauById', this.$route.params.id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },


            AdmincountryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            AdmincountyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            AdminconstituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            newAdminModal(bureau_id){
                console.log(bureau_id)
                 this.editmodeAdmin= false;
                 this.adminform.reset()
                 this.adminform.bureau_id;
                     $('#AdminModal').modal('show')
            },
            //bureau admin passposrt image
            adminLoadPassPhoto(adminpivot_photo){
                if(adminpivot_photo){
                    return "/assets/bureau/img/admins/passports/"+adminpivot_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            //admin passport photo
            adminChangePassPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminPassPhoto(adminform_bureauadmin_photo){
                // console.log(adminform_bureauadmin_photo)
                let img = this.adminform.photo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.adminform.photo;
                        }else{
                            if(adminform_bureauadmin_photo){
                                return "assets/bureau/img/admins/passports/"+adminform_bureauadmin_photo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            adminLoadIDFrontPhoto(adminpivot_id_photo_front){
                if(adminpivot_id_photo_front){
                    return "/assets/bureau/img/admins/IDs/front/"+adminpivot_id_photo_front;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            adminChangeIDFrontPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminIDFrontPhoto(adminform_id_photo_front){
                let img = this.adminform.id_photo_front;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.adminform.id_photo_front;
                        }else{
                            if(adminform_id_photo_front){
                                return "assets/bureau/img/admins/IDs/front/"+adminform_id_photo_front;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            adminLoadIDBackPhoto(adminform_id_photo_back){
                if(adminform_id_photo_back){
                    return "/assets/bureau/img/admins/IDs/back/"+adminform_id_photo_back;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            adminChangeIDBackPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminIDBackPhoto(adminform_id_photo_back){
                let img = this.adminform.id_photo_back;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.adminform.id_photo_back;
                        }else{
                            if(adminform_id_photo_back){
                                return "assets/bureau/img/admins/IDs/back/"+adminform_id_photo_back;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            viewAdminModal(id){
                console.log(id)
                this.$Progress.start();
                    //get bueau admin by id
                this.$store.dispatch('BureauAdminById', id)  //action from index.js
                    .then((response)=>{
                       $('#ViewAdminModal').modal('show')
                       toast({
                        type: 'success',
                        title: 'Fetched the Bureau Admin data successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        //errors
                        $('#ViewAdminModal').modal('show');
                        toast({
                        type: 'error',
                        title: 'There was something Wrong Wheen feching data'
                        })
                    })
            },
            editAdminModal(id){
                console.log(id)
                 this.editmodeAdmin = true;
                 this.adminform.reset()
                    this.$Progress.start();
                      axios.get('/bureauadmin/edit/'+id)
                        .then((response)=>{
                           $('#AdminModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Admin data successfully'
                            })
                            console.log(response.data)
                            this.adminform.fill(response.data.admin)
                            this.adminform.user_id = response.data.admin.bureauadmins[0].pivot.user_id
                            this.adminform.bureau_id = response.data.admin.bureauadmins[0].pivot.bureau_id
                            // // this.adminform.position_id = response.data.admin.bureauadmins[0].pivot.position_id
                            this.adminform.photo = response.data.admin.bureauadmins[0].pivot.photo
                            this.adminform.id_no = response.data.admin.bureauadmins[0].pivot.id_no
                            this.adminform.id_photo_front = response.data.admin.bureauadmins[0].pivot.id_photo_front
                            this.adminform.id_photo_back = response.data.admin.bureauadmins[0].pivot.id_photo_back
                            this.adminform.phone = response.data.admin.bureauadmins[0].pivot.phone
                            this.adminform.landline = response.data.admin.bureauadmins[0].pivot.landline
                            this.adminform.address = response.data.admin.bureauadmins[0].pivot.address

                        // //    //get country id
                            this.adminform.country_id = response.data.admin.bureauadmins[0].pivot.country_id
                            //get county id using the country id
                            this.adminform.county_id = response.data.admin.bureauadmins[0].pivot.county_id
                            this.$store.dispatch('countrycounties', response.data.admin.bureauadmins[0].pivot.country_id);
                            //get contituency using county id
                            this.adminform.constituency_id = response.data.admin.bureauadmins[0].pivot.constituency_id
                            this.$store.dispatch('countyconstituencies', response.data.admin.bureauadmins[0].pivot.county_id);
                            // //get ward usng constituency id
                            this.adminform.ward_id = response.data.admin.bureauadmins[0].pivot.ward_id
                            this.$store.dispatch('constituencywards', response.data.admin.bureauadmins[0].pivot.constituency_id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#AdminModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            addAdmin(Bureau_id) {
                console.log(Bureau_id)
                this.$Progress.start();
                this.adminform.patch('/bureauadmin/'+Bureau_id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Admin Created successfully'
                            })
                            this.$store.dispatch('BureauById', this.$route.params.id);
                            this.adminform.reset()
                            $('#AdminModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#AdminModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateAdmin(id){
                  console.log(id)
                  this.$Progress.start();
                     this.adminform.patch('/bureauadmin/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('BureauById', this.$route.params.id);
                         $('#AdminModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Admin Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteAdmin(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete admin', id)
                        this.$Progress.start();
                        this.adminform.get('/bureauadmin/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Admin Deleted successfully'
                            })
                            this.$store.dispatch('BureauById', this.$route.params.id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },



            EmployeecountryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            EmployeecountyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            EmployeeconstituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            newEmployeeModal(bureau_id){
                console.log(bureau_id)
                 this.editmodeEmployee= false;
                 this.employeeform.reset()
                 this.employeeform.bureau_id;
                     $('#EmployeeModal').modal('show')
            },
            //bureau employee passposrt image
            employeeLoadPassPhoto(employeepivot_photo){
                if(employeepivot_photo){
                    return "/assets/bureau/img/employees/passports/"+employeepivot_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            //employee passport photo
            employeeChangePassPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.employeeform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateEmployeePassPhoto(employeeform_bureauemployee_photo){
                // console.log(employeeform_bureauemployee_photo)
                let img = this.employeeform.photo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.employeeform.photo;
                        }else{
                            if(employeeform_bureauemployee_photo){
                                return "assets/bureau/img/employees/passports/"+employeeform_bureauemployee_photo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            employeeLoadIDFrontPhoto(employeepivot_id_photo_front){
                if(employeepivot_id_photo_front){
                    return "/assets/bureau/img/employees/IDs/front/"+employeepivot_id_photo_front;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            employeeChangeIDFrontPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.employeeform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateEmployeeIDFrontPhoto(employeeform_id_photo_front){
                let img = this.employeeform.id_photo_front;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.employeeform.id_photo_front;
                        }else{
                            if(employeeform_id_photo_front){
                                return "assets/bureau/img/employees/IDs/front/"+employeeform_id_photo_front;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            employeeLoadIDBackPhoto(employeeform_id_photo_back){
                if(employeeform_id_photo_back){
                    return "/assets/bureau/img/employees/IDs/back/"+employeeform_id_photo_back;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            employeeChangeIDBackPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.employeeform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateEmployeeIDBackPhoto(employeeform_id_photo_back){
                let img = this.employeeform.id_photo_back;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.employeeform.id_photo_back;
                        }else{
                            if(employeeform_id_photo_back){
                                return "assets/bureau/img/employees/IDs/back/"+employeeform_id_photo_back;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            viewEmployeeModal(id){
                console.log(id)
                this.$Progress.start();
                    //get bueau employee by id
                this.$store.dispatch('BureauEmployeeById', id)  //action from index.js
                    .then((response)=>{
                       $('#ViewEmployeeModal').modal('show')
                       toast({
                        type: 'success',
                        title: 'Fetched the Bureau Employee data successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        //errors
                        $('#ViewEmployeeModal').modal('show');
                        toast({
                        type: 'error',
                        title: 'There was something Wrong Wheen feching data'
                        })
                    })
            },
            editEmployeeModal(id){
                console.log(id)
                 this.editmodeEmployee = true;
                 this.employeeform.reset()
                    this.$Progress.start();
                      axios.get('/bureauemployee/edit/'+id)
                        .then((response)=>{
                           $('#EmployeeModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Employee data successfully'
                            })
                            console.log(response.data)
                            this.employeeform.fill(response.data.employee)
                            this.employeeform.user_id = response.data.employee.bureauemployees[0].pivot.user_id
                            this.employeeform.bureau_id = response.data.employee.bureauemployees[0].pivot.bureau_id
                            // // this.employeeform.position_id = response.data.employee.bureauemployees[0].pivot.position_id
                            this.employeeform.photo = response.data.employee.bureauemployees[0].pivot.photo
                            this.employeeform.id_no = response.data.employee.bureauemployees[0].pivot.id_no
                            this.employeeform.id_photo_front = response.data.employee.bureauemployees[0].pivot.id_photo_front
                            this.employeeform.id_photo_back = response.data.employee.bureauemployees[0].pivot.id_photo_back
                            this.employeeform.phone = response.data.employee.bureauemployees[0].pivot.phone
                            this.employeeform.landline = response.data.employee.bureauemployees[0].pivot.landline
                            this.employeeform.address = response.data.employee.bureauemployees[0].pivot.address

                        // //    //get country id
                            this.employeeform.country_id = response.data.employee.bureauemployees[0].pivot.country_id
                            //get county id using the country id
                            this.employeeform.county_id = response.data.employee.bureauemployees[0].pivot.county_id
                            this.$store.dispatch('countrycounties', response.data.employee.bureauemployees[0].pivot.country_id);
                            //get contituency using county id
                            this.employeeform.constituency_id = response.data.employee.bureauemployees[0].pivot.constituency_id
                            this.$store.dispatch('countyconstituencies', response.data.employee.bureauemployees[0].pivot.county_id);
                            // //get ward usng constituency id
                            this.employeeform.ward_id = response.data.employee.bureauemployees[0].pivot.ward_id
                            this.$store.dispatch('constituencywards', response.data.employee.bureauemployees[0].pivot.constituency_id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#EmployeeModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            addEmployee(Bureau_id) {
                console.log(Bureau_id)
                this.$Progress.start();
                this.employeeform.patch('/bureauemployee/'+Bureau_id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Employee Created successfully'
                            })
                            this.$store.dispatch('BureauById', this.$route.params.id);
                            this.employeeform.reset()
                            $('#EmployeeModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#EmployeeModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateEmployee(id){
                  console.log(id)
                  console.log(+this.$route.params.id)
                  this.$Progress.start();
                     this.employeeform.patch('/bureauemployee/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('BureauById', this.$route.params.id);
                         $('#EmployeeModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Employee Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteEmployee(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete employee', id)
                        this.$Progress.start();
                        this.employeeform.get('/bureauemployee/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Employee Deleted successfully'
                            })
                            this.$store.dispatch('BureauById', this.$route.params.id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },



        },
        watch:{
            $route(to, from){
                this.singleabureau();//method
           }
        }

    }
</script>

