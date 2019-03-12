
//bureauhousehelp module

const state = {
    househelps:[],
    househelp:[],
  };
const getters = {
    Househelps(state){
      return state.househelps;
    },
    Househelp(state){
      return state.househelp;
    }
  };
const actions = {
    househelps(context){//permission.index route laravel
      axios.get('/househelp/get')
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByGenderID(context, payload){//permission.index route laravel
      axios.get('/genderhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByEducationID(context, payload){//permission.index route laravel
      axios.get('/educationhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByDurationID(context, payload){//permission.index route laravel
      axios.get('/durationhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByExperienceID(context, payload){//permission.index route laravel
      axios.get('/experiencehousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByMaritalstatusID(context, payload){//permission.index route laravel
      axios.get('/maritalstatushousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByOperationID(context, payload){//permission.index route laravel
      axios.get('/operationhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsBySkillID(context, payload){//permission.index route laravel
      axios.get('/skillhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByReligionID(context, payload){//permission.index route laravel
      axios.get('/religionhousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByTribeID(context, payload){//permission.index route laravel
      axios.get('/tribehousehelps/get/'+payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpsByFilter(context, payload){//permission.index route laravel
        console.log(payload)
      axios.post('/househelpfilter/get', payload)
      .then((response)=>{
        console.log(response.data)
        context.commit('househelps', response.data.househelps);
      });
    },
    HousehelpById(context, payload){
        // console.log(payload)
        axios.get('/househelp/show/'+payload)
              .then((response)=>{
                  console.log(response.data, 'teiyo');
                  context.commit('househelp', response.data.househelp);
              });
    }
  };
const mutations = {
    househelps(state, data){
      return state.househelps = data;
    },
    househelp(state, data){
      return state.househelp = data;
    }
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};





