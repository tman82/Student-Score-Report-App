
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
      newItem: {'firstName': '', 'lastName': '', 'assignmentName': '', 'dueDate': '', 'grades': ''},
      items: [],
      e_id: '',
      e_firstName: '',
      e_lastName: '',
      e_assignmentName: '',
      e_dueDate: '',
      e_grades: ''
    },
    mounted: function mounted() {
        this.getItems();
    },
    methods: {
      getItems: function() {
        let _this = this;
        axios.get('/getItems').then(function(response) {
          _this.items = response.data;
        })
      },
      setVal(val_id, val_firstName, val_lastName, val_assignmentName, val_dueDate, val_grades ) {
        this.e_id = val_id;
        this.e_firstName = val_firstName;
        this.e_lastName = val_lastName;
        this.e_assignmentName = val_assignmentName;
        this.e_dueDate = val_dueDate;
        this.e_grades = val_grades;
      }
      createItem: function() {
        let input = this.newItem;
        let _this = this;
        if(input['firstName'] == '' || input['lastName'] == '' || input['assignmentName'] == '' || input['dueDate'] == '' || input['grades'] == '') {
          this.hasError = false;
        } else {
          this.hasError = true;
          axios.post('/storeItem', input),then(function(response) {
            _this.newItem = {'firstName': '', 'lastName': '', 'assignmentName': '', 'dueDate': '', 'grades': ''}
            _this.getItems();
          });
        }
      },

      editItem: function editItem() {
        let _this = this;
        let i_val = document.getElementById('e_id');
        let ln_val = document.getElementById('e_lastName');
        let fn_val = document.getElementById('e_firstName');
        let an_val = document.getElementById('e_assignmentName');
        let dd_val = document.getElementById('e_dueDate');
        let g_val = document.getElementById('e_grades');

        axios.post('/editItem' + i_val.value, {val1: fn_val.value, val2: ln_val.value, val3: an_val.value, val4: dd_val.value, val5: g_val.value}),then(function(response) {
          _this.getItem();
          _this.showModal = false;
        });

      }
    }

});
