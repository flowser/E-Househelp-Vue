<template>
    <div class="container-fluid mt-5">
        <div class="card card-widget widget-user" >
                   <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="widget-user-header text-white" style="background: url('assets/organisation/img/background/background-1.jpg')

                    center center;width:100%;height:300px">

                <div class="clearfix">
                    <span class="float-left">
                        <h3 class="widget-user-username">{{SingleService.title}}</h3>
                    </span>
                    <span class="float-right">
                        <h5 class="widget-user-desc" style="margin-bottom:0">{{SingleService.service_title}}</h5>
                        <p class="widget-user-desc" style="margin-bottom:0">{{SingleService.service_details}}</p>
                        <p style="margin-bottom:-0.5em">
                            <small class="text-muted" v-if="SingleService.user">Updated By: {{SingleService.user.full_name}}</small>
                        </p>
                        <p style="margin-bottom:0.25em">
                            <small class="text-muted">Last updated On: {{SingleService.updated_at | dateformat}}</small>
                        </p>
                    </span>
                </div>
            </div>
            <div class="widget-user-image" style="top:70px;">
                <img :src="serviceLoadImage(SingleService.service_image)"  class="border-0" alt="" style="width:160px;">

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md">
                    <div class="card-hearder">
                        <h3 class="card-title">
                             <a href="#ServiceModel">Service Model Settings</a>
                        </h3>
                        <div class="card-tools">
                            <router-link  to="/settings" class="pull-left btn btn-success">Home Settings
                                <i class="icon-angle-right"></i>
                            </router-link>
                            <button class="pul-right btn btn-success" @click.prevent="newServiceModelModal()" >Add new Service Models
                                <i class="fas fa-plus fw"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                             <div  v-for="servicemodel in ServiceModelsbyServID" :key="servicemodel.id" class="col-md-3 d-flex">
                                <div class="card flex-fill" >
                                        <img class="card-img-top " :src="servicemodelLoadImage(servicemodel.image)" style="width:100%;height:150px;">
                                    <div class="card-body" >
                                        <h5 class="card-title text-center">{{servicemodel.title}}</h5>
                                        <p style="margin-bottom:-0.5em" class="card-text">{{servicemodel.details }}</p>
                                        <!-- <p style="margin-bottom:-0.5em" class="card-text">{{servicemodel.why | sortlength(80, "...") }}</p> -->
                                    </div>
                                        <!-- <router-link  :to="`/servicemodel/${servicemodel.id}`" class="pull-right blue">Read More <i class="icon-angle-right"></i></router-link> -->
                                    <div class="clearfix">
                                        <span class="float-left" style="margin-bottom:-0.5em" >
                                            <p style="margin-bottom:-0.5em">
                                                <small class="text-muted">Updated By: {{servicemodel.user.full_name}}</small>
                                            </p>
                                            <p style="margin-bottom:0.25em">
                                                  <small class="text-muted">On: {{servicemodel.updated_at | dateformat}}</small>
                                            </p>
                                        </span>
                                        <span class="float-right">
                                             <a href=""  @click.prevent="editServiceModelModal(servicemodel.id)">
                                                <i class="fa fa-edit blue"></i>
                                             </a>
                                              /
                                             <a href=""  @click.prevent="deleteServiceModel(servicemodel.id)">
                                                 <i class="fa fa-trash red"></i>
                                              </a>
                                         </span>
                                     </div>
                                  </div>
                            </div>
                              <ul class="pagination" style="padding: 0px;margin: 0px;">
                              </ul>
                        </div>
                    </div>
                </div>
             </div>
        </div>


            <div class="modal fade " id="ServiceModelModal" tabindex="-1" role="dialog" aria-labelledby="ServiceModelModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="editmodelServiceModel" id="ServiceModelModalLabel">Update Service Model</h5>
                            <h5 class="modal-title" v-show="!editmodelServiceModel" id="ServiceModelModalLabel">Add New Service Model</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" @submit.prevent="editmodelServiceModel ? updateServiceModel(servicemodelform.id) : addServiceModel()" >
                            <div class="modal-body">
                                <div class=" row">
                                    <div class="form-group col-md-6">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input v-model="servicemodelform.title" type="text" name="title" placeholder="Title"
                                            class="form-control" :class="{ 'is-invalid': servicemodelform.errors.has('title') }" >
                                        <has-error style="color: #e83e8c" :form="servicemodelform" field="title"></has-error>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-12">
                                        <label for="details" class="col-form-label">Service Details</label>
                                        <textarea v-model="servicemodelform.details" type="text" name="details" placeholder="Service details"
                                            class="form-control" :class="{ 'is-invalid': servicemodelform.errors.has('details') }" >
                                        </textarea>
                                        <has-error style="color: #e83e8c" :form="servicemodelform" field="details"></has-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="image" class=" col-form-label">Service Us Front Image 6</label><br>
                                            <input @change="servicemodelChangeImage($event)" type="file" name="image"
                                                :class="{ 'is-invalid': servicemodelform.errors.has('image') }">

                                                <img v-show="editmodelServiceModel" :src="updateServiceModelImage(servicemodelform.image)" alt="" width="100%" >
                                                <img  v-show="!editmodelServiceModel" :src="servicemodelform.image" alt="" width="100%" >
                                            <has-error style="color: #e83e8c" :form="servicemodelform" field="image"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button v-show="editmodelServiceModel" type="submit" class="btn btn-success">Update</button>
                                <button v-show="!editmodelServiceModel" type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    </div>

</template>

<script>
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
                name:"SingleService",
                data(){
                    return{
                        editmodelServiceModel: false,
                        servicemodelform: new Form({
                            id:'',
                            title:'',
                            details:'',
                            image:'',
                        }),
                    }
                },
                computed:{
                    SingleService(){
                        return this.$store.getters.SingleService
                    },
                    ServiceModelsbyServID(){
                        console.log('data fom by id', this.$store.getters.ServiceModelsbyServID)
                        return this.$store.getters.ServiceModelsbyServID
                    },
                },
                methods:{
                    singleservice(){
                        this.$store.dispatch('ServiceById', this.$route.params.id);   //action from index.js
                    },
                    servicemodels(){
                        console.log('servicemodel fecth', this.$route.params.id)
                        this.$store.dispatch('ServiceModelsByServiceID', this.$route.params.id);
                    },
                    newServiceModelModal(){
                        this.editmodeServiceModel = false;
                        this.servicemodelform.reset()
                            $('#ServiceModelModal').modal('show')
                    },
                    //Service Images
                    servicemodelChangeImage(event){
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
                                    this.servicemodelform.image =event.target.result
                                        // console.log(event.target.result)
                                    };
                                reader.readAsDataURL(file);
                        }
                    },
                    serviceLoadImage(image_id){
                        if(image_id){
                            return "/assets/organisation/img/website/services/"+image_id;
                        }else{
                            return "/assets/organisation/img/website/empty.png";
                        }
                    },
                    servicemodelLoadImage(image_id){
                        if(image_id){
                            return "/assets/organisation/img/website/services/servicemodels/"+image_id;
                        }else{
                            return "/assets/organisation/img/website/empty.png";
                        }
                    },
                    updateServiceModelImage(servicemodelformimage){
                        // console.log(servicemodelformimage, 'mixcv')
                        let img = this.servicemodelform.image;
                            if(img.length>100){
                                    return this.servicemodelform.image;
                                }else{
                                    if(servicemodelformimage){
                                        return "assets/organisation/img/website/services/servicemodels/"+servicemodelformimage;
                                    }else{
                                        return "/assets/organisation/img/website/empty.png";
                                    }
                                }
                    },
                    editServiceModelModal(id){
                        this.editmodelServiceModel = true;
                        this.servicemodelform.reset()
                        console.log('edit service', id)
                            this.$Progress.start();
                            axios.get('/servicemodel/edit/'+id)

                                .then((response)=>{
                                    console.log(response.data)
                                $('#ServiceModelModal').modal('show')
                                toast({
                                    type: 'success',
                                    title: 'Fetched the ServiceModel data successfully'
                                    })
                                    this.servicemodelform.fill(response.data.servicemodel)
                                    this.$Progress.finish();
                                })
                                .catch(()=>{

                                    //errors
                                    $('#ServiceModelModal').modal('show');
                                    toast({
                                    type: 'error',
                                    title: 'There was something Wrong'
                                    })
                                    this.$Progress.fail();
                                })
                    },
                    addServiceModel(){
                        this.$Progress.start();
                        this.servicemodelform.patch('/servicemodel/'+this.$route.params.id)
                            .then((response)=>{
                                //  console.log(response.data)
                                toast({
                                     type: 'success',
                                     title: 'Feature Info Created successfully'
                                     })

                                      this.$store.dispatch( "organisation")//methods action
                                      this.$store.dispatch('ServiceModelsByServiceID', this.$route.params.id);
                                      this.$store.dispatch('ServiceById', this.$route.params.id);
                                      this.servicemodelform.reset()
                                      $('#ServiceModelModal').modal('hide')
                                      this.$Progress.finish()
                           })
                              .catch(()=>{
                                  this.$Progress.fail()
                                  $('#ServiceModelModal').modal('show');
                                      toast({
                                       type: 'error',
                                       title: 'There was something wrong.'
                                       })
                           })
                   },
                    updateServiceModel(id){
                        this.$Progress.start();
                            this.servicemodelform.patch('/servicemodel/update/'+id)
                                .then(()=>{
                                     this.$store.dispatch( "organisation")
                                    this.$store.dispatch('ServiceModelsByServiceID', this.$route.params.id);
                                    this.$store.dispatch('ServiceById', this.$route.params.id);
                                this.servicemodelform.reset()
                                this.editmodelServiceModel = false;
                                $('#ServiceModelModal').modal('hide')
                                toast({
                                    type: 'success',
                                    title: 'Service Updated successfully'
                                    })
                                      this.$Progress.finish()
                                })
                                .catch(()=>{
                                    this.$Progress.fail();
                                    $('#ServiceModelModal').modal('show')
                                    toast({
                                    type: 'error',
                                    title: 'There was something wrong'
                                    })
                                })
                    },
                    deleteServiceModel(id){
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
                                //  console.log('delete user', id)
                                    this.$Progress.start();
                                    this.servicemodelform.get('/servicemodel/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'Service Deleted successfully'
                                        })
                                         this.$store.dispatch( "organisation")
                                       this.$store.dispatch('ServiceModelsByServiceID', this.$route.params.id);
                                      this.$store.dispatch('ServiceById', this.$route.params.id);
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
                        }

                },
                mounted() { //action
                        this.singleservice();  //method
                        this.servicemodels();  //method

                },
                watch:{
                    $route(to, from){
                          this.singleservice();//method
                          this.servicemodels();//method
                    }
                }
            }
</script>



