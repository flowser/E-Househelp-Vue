<template>
  <div id="filter">
    <section id="filter">
        <div class="container-fluid">
            <form role="form" action="#">
                <h2 class="text-center" style="margin-bottom: 10px">Choose Your Desired Filter</h2>
                <div class="row" style="margin-right: 1px; margin-left: 1px; ">
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 100px; padding-left: 5px; padding-right: 0px;">
                         <label for="education">Age Limit</label>
                         <select class="form-control" v-model="filterform.age">
                                 <option disabled value="">Age</option>
                                 <option class="option" value="15-20">15-20 years</option>
                                 <option class="option" value="21-25">21-25 years</option>
                                 <option  class="option" value="26-30">26-30 years</option>
                                 <option class="option" value="31-35">31-35 years</option>
                                 <option class="option"  value="36-40">36-40 years</option>
                                 <option class="option"  value="41-50">41-50 years</option>
                         </select>
                     </div>
                    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 100px;padding-left: 5px; padding-right: 0px;">
                        <label for="gender_id">Select Gender</label>
                        <select class="form-control" v-model="filterform.gender_id">
                                <option disabled value="">Gender</option>
                                <option v-for="gender in Genders" :value="gender.id" :key="gender.id">{{gender.name}}</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 115px;padding-left: 5px; padding-right: 0px;">
                         <label for="education_id">Education Level</label>
                         <select class="form-control" v-model="filterform.education_id">
                                 <option disabled value="">Education</option>
                                 <option v-for="education in Educations" :value="education.id" :key="education.id">{{education.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 125px;padding-left: 5px; padding-right: 0px;">
                         <label for="experience_id"> Experience</label>
                         <select class="form-control" v-model="filterform.experience_id">
                                 <option disabled value="">Experience</option>
                                 <option v-for="experience in Experiences" :value="experience.id" :key="experience.id">{{experience.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 133px;padding-left: 5px; padding-right: 0px;">
                         <label for="maritalstatus_id">Maritalstatus</label>
                         <select class="form-control" v-model="filterform.maritalstatus_id">
                                 <option disabled value="">Maritalstatus</option>
                                 <option v-for="maritalstatus in Maritalstatuses" :value="maritalstatus.id" :key="maritalstatus.id">{{maritalstatus.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 85px;padding-left: 5px; padding-right: 0px;">
                         <label for="tribe_id">Tribe</label>
                         <select class="form-control" v-model="filterform.tribe_id">
                                 <option disabled value="">Tribe</option>
                                 <option v-for="tribe in Tribes" :value="tribe.id" :key="tribe.id">{{tribe.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 80px;padding-left: 5px; padding-right: 0px;">
                         <label for="skill_id">Skill Level</label>
                         <select class="form-control" v-model="filterform.skill_id">
                                 <option disabled value="">Skill</option>
                                 <option v-for="skill in Skills" :value="skill.id" :key="skill.id">{{skill.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 140px;padding-left: 5px; padding-right: 0px;">
                         <label for="operation_id">Operation</label>
                         <select class="form-control" v-model="filterform.operation_id">
                                 <option disabled value="">Operation</option>
                                 <option v-for="operation in Operations" :value="operation.id" :key="operation.id">{{operation.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 105px;padding-left: 5px; padding-right: 0px;">
                         <label for="duration_id">Duration</label>
                         <select class="form-control" v-model="filterform.duration_id">
                                 <option disabled value="">Duration</option>
                                 <option v-for="duration in Durations" :value="duration.id" :key="duration.id">{{duration.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 137px;padding-left: 5px; padding-right: 0px;">
                         <label for="englishstatus_id">Englishstatus</label>
                         <select class="form-control" v-model="filterform.englishstatus_id">
                                 <option disabled value="">Englishstatus</option>
                                 <option v-for="englishstatus in Englishstatuses" :value="englishstatus.id" :key="englishstatus.id">{{englishstatus.name}}</option>
                         </select>
                     </div>
                      <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 103px;padding-left: 5px; padding-right: 0px;">
                         <label for="religion_id">Religion Level</label>
                         <select class="form-control" v-model="filterform.religion_id">
                                 <option disabled value="">Religion</option>
                                 <option v-for="religion in Religions" :value="religion.id" :key="religion.id">{{religion.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 116px;padding-left: 5px; padding-right: 0px;">
                         <label for="kid_id">Kid </label>
                         <select class="form-control" v-model="filterform.kid_id">
                                 <option disabled value="">Kid Status</option>
                                 <option v-for="kid in Kids" :value="kid.id" :key="kid.id">{{kid.name}}</option>
                         </select>
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 116px;padding-left: 5px; padding-right: 0px;">
                         <label for="kid_id">ID Status </label>
                         <select class="form-control" v-model="filterform.IDstatus">
                                 <option disabled value="">ID Status</option>
                                 <option  class="option" value="yes" > Has ID</option>
                                 <option  class="option" value="no" > No ID</option>
                         </select>                        
                     </div>
                     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-md-3 col-lg-3" style="width: 116px;padding-left: 5px; padding-right: 0px;">
                         <label for="kid_id">Health </label>
                         <select class="form-control" v-model="filterform.healthstatus">
                                 <option disabled value="">Health</option>
                                 <option  class="option" value="Healthy"> Healthy</option>
                                 <option  class="option" value="HASMINOR" > Has Minor Issues</option>
                                 <option  class="option" value="HASCHRONIC" > Has Other Chronic Issues</option>
                         </select>  
                     </div>
                </div>
                 <div class=" row" style="margin-right: 1px; margin-left: 1px; ">
                     <button type="submit" @click.prevent="filter">Filter</button>
                     <!-- <button type="submit" class="btn btn-success">filter</button> -->
                 </div>
            </form>
        </div>
    </section>
  </div>
</template>

<script>
    export default {
        name:"Filters",
        data(){
            return{
                filterform:new Form({
                    age:'',
                    gender_id:'',
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
                    IDstatus:'',
                    healthstatus:'',
                }),
            }
        },
        mounted() {
            // this.loadHousehelps();
            this.loadDurations();
            this.loadEducations();
            this.loadEnglishstatuses();
            this.loadExperiences();
            this.loadKids();
            this.loadMaritalstatuses();
            this.loadOperations();
            this.loadReligions();
            this.loadSkills();
            this.loadTribes();
            this.loadGenders();
            this.loadIDstatuses();
            this.loadHealthstatuses();
        },
        computed:{
            Genders(){
               return this.$store.getters.Genders
            },
            Educations(){
               return this.$store.getters.Educations
            },
            Durations(){
               return this.$store.getters.Durations
            },
            Englishstatuses(){
               return this.$store.getters.Englishstatuses
            },
            Experiences(){
               return this.$store.getters.Experiences
            },
            Kids(){
               return this.$store.getters.Kids
            },
            Maritalstatuses(){
               return this.$store.getters.Maritalstatuses
            },
            Operations(){
               return this.$store.getters.Operations
            },
            Religions(){
               return this.$store.getters.Religions
            },
            Skills(){
               return this.$store.getters.Skills
            },
            Tribes(){
               return this.$store.getters.Tribes
            },
            IDstatuses(){
               return this.$store.getters.IDstatuses
            },
            Healthstatuses(){
               return this.$store.getters.Healthstatuses
            },

        },
        methods:{
            loadGenders(){
               return this.$store.dispatch("genders")
            },
            loadRelationships(){
               return this.$store.dispatch("relationships")
            },
            loadEducations(){
               return this.$store.dispatch("educations")
            },
            loadDurations(){
               return this.$store.dispatch("durations")
            },
            loadEnglishstatuses(){
               return this.$store.dispatch("englishstatuses")
            },
            loadExperiences(){
               return this.$store.dispatch("experiences")
            },
            loadKids(){
               return this.$store.dispatch("kids")
            },
            loadMaritalstatuses(){
               return this.$store.dispatch("maritalstatuses")
            },
            loadOperations(){
               return this.$store.dispatch("operations")
            },
            loadReligions(){
               return this.$store.dispatch("religions")
            },
            loadSkills(){
               return this.$store.dispatch("skills")
            },
            loadTribes(){
               return this.$store.dispatch("tribes")
            },
            loadIDstatuses(){
                return this.$store.dispatch("idstatuses")
            },
            loadHealthstatuses(){
                return this.$store.dispatch("healthstatuses")
            },            
            filter:_.debounce(function () {
                this.$Progress.start();
                                this.$store.dispatch("HousehelpsByFilter", this.filterform)
                .then((response)=>{
                     toast({
                        type: 'success',
                        title: 'Househlp Filtration search has been successful'
                        })
                        this.filterform.reset()
                          this.$Progress.finish()
                })
                .catch(()=>{
                    this.$Progress.fail()
                    //errors
                        toast({
                            type: 'error',
                            title: 'Househlp Filtration search was not successful, change your Filters.'
                            })
                })
            }, 20)       
        },
    }
</script>
