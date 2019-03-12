<template>
  <div id="leftsidebar">
     <div class="left-sidebar">
		<h2>Filters</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
                        <a href="" @click.prevent="allHousehelps()" style="color:#9a009a;">View All ({{Househelps.length}}) 													
						</a>			
					</h4>
				</div>				
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#gender">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Gender
						</a>
					</h4>
				</div>
				<div id="gender" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li v-for="gender in Genders" :key="gender.id" v-if="gender.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByGenderID(gender.id)" style="color:#9a009a; ">{{gender.name}}</a>
                                    <span>({{gender.househelps.length}})</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#education">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Education
						</a>
					</h4>
				</div>
				<div id="education" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="education in Educations" :key="education.id" v-if="education.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByEducationID(education.id)" style="color:#9a009a; ">{{education.name}}</a>
                                    <span>({{education.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#duration">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Duration
						</a>
					</h4>
				</div>
				<div id="duration" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="duration in Durations" :key="duration.id" v-if="duration.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByDurationID(duration.id)" style="color:#9a009a; ">{{duration.name}}</a>
                                    <span>({{duration.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
			 </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#experience">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Experience
                        </a>
                    </h4>
                </div>
                <div id="experience" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="experience in Experiences" :key="experience.id" v-if="experience.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByExperienceID(experience.id)" style="color:#9a009a; ">{{experience.name}}</a>
                                    <span>({{experience.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#maritalstatus">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Marital
                        </a>
                    </h4>
                </div>
                <div id="maritalstatus" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="maritalstatus in Maritalstatuses" :key="maritalstatus.id" v-if="maritalstatus.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByMaritalstatusID(maritalstatus.id)" style="color:#9a009a; ">{{maritalstatus.name}}</a>
                                    <span>({{maritalstatus.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#operation">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Operation
                        </a>
                    </h4>
                </div>
                <div id="operation" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="operation in Operations" :key="operation.id" v-if="operation.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByOperationID(operation.id)" style="color:#9a009a; ">{{operation.name}}</a>
                                    <span>({{operation.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#skill">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Skill
                        </a>
                    </h4>
                </div>
                <div id="skill" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="skill in Skills" :key="skill.id" v-if="skill.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsBySkillID(skill.id)" style="color:#9a009a; ">{{skill.name}}</a>
                                    <span>({{skill.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#religion">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Religion
                        </a>
                    </h4>
                </div>
                <div id="religion" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="religion in Religions" :key="religion.id" v-if="religion.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByReligionID(religion.id)" style="color:#9a009a; ">{{religion.name}}</a>
                                    <span>({{religion.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#tribe">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Tribe
                        </a>
                    </h4>
                </div>
                <div id="tribe" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li v-for="tribe in Tribes" :key="tribe.id" v-if="tribe.househelps.length>0">
                                <a href="" @click.prevent="HousehelpsByTribeID(tribe.id)" style="color:#9a009a; ">{{tribe.name}}</a>
                                    <span>({{tribe.househelps.length}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
		</div><!--/category-products-->
	</div>
  </div>
</template>

<script>
    export default {
        name:"Leftsidebar",
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
                }),
            }
        },
        mounted() {
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
            Househelps(){
                return this.$store.getters.Househelps
            }
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
            HousehelpsByGenderID(id){
                this.filterform.gender_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByEducationID(id){
               this.filterform.education_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByDurationID(id){
                this.filterform.duration_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByExperienceID(id){
                this.filterform.experience_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByMaritalstatusID(id){
                this.filterform.maritalstatus_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByOperationID(id){
                this.filterform.operation_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsBySkillID(id){
                this.filterform.skill_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByReligionID(id){
                this.filterform.religion_id = id; 
                console.log('religion', this.filterform.religion_id)               
                // this.$store.dispatch("HousehelpsByReligionID", +id)
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            HousehelpsByTribeID(id){
                this.filterform.tribe_id = id;
                this.$store.dispatch("HousehelpsByFilter",
                     this.filterform
                 )
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Househlp Filtration search was been successful'
                            })
                            // this.$store.dispatch("househelps")
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
                    });
            },
            allHousehelps(){
                return this.$store.dispatch("househelps")
            }
        }
    }
</script>
