<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>



      <div id="app_vue">

        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

              <p class="text-center alert alert-danger" v-bind:class="{hidden: hasError}">Please fill all the fields</p>

              <div class="form-group">
                <label for="">First Name </label>
                <input id="first-name" type="text" name="first_name" required="required" class="form-control" placeholder="Enter first name">
              </div>
              <div class="form-group">
                <label for="">Last Name </label>
                <input id="last-name" type="text" name="last_name" required="required" class="form-control" placeholder="Enter last name">
              </div>
              <div class="form-group">
                <label for="">Assignment Name </label>
                <input id="assignment-name" type="text" name="assignment_name" required="required" class="form-control" placeholder="Enter the assignment name">
              </div>
              <div class="form-group">
                <label for="">Due Date </label>
                <input id="due-date" type="text" name="due_date" required="required" class="form-control" placeholder="Enter due date">
              </div>
              <div class="form-group">
                <label for="">Grades </label>
                <input id="grades" type="text" name="all_grades" required="required" class="form-control" placeholder="Enter grades">
              </div>
              <div class="btn btn-primary">
                <span class="glyphicon glyphicon-plus" style="margin-right: 5px;" @click.prevent="createItem()"></span>Add
              </div>
              <div class="table table-borderless" id="table">
                <table class="table table-borderless" id="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Age</th>
                      <th>Profession</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tr v-for="item in items">
                    <td>@{{item.firstName}}</td>
                    <td>@{{item.lastName}}</td>
                    <td>@{{item.assignmentName}}</td>
                    <td>@{{item.dueDate}}</td>
                    <td>@{{item.grades}}</td>

                  </tr>
                </table>
              </div>

              <modal v-if="showModal" @close="showModal=false">
                   <h3 slot="header">Edit Item</h3>
                   <div slot="body">

                       <input type="hidden" disabled class="form-control" id="e_id" name="id"
                               required  :value="this.e_id">
                       First Name: <input type="text" class="form-control" id="first_name" name="firstName"
                               required  :value="this.e_firstName">
                       Last Name: <input type="number" class="form-control" id="e_lastName" name="lastName"
                       required  :value="this.e_lastName">
                       Assignment Name: <input type="text" class="form-control" id="e_assignmentName" name="assignmentName"
                       required  :value="this.assignmentName">
                       Due Date: <input type="text" class="form-control" id="e_dueDate" name="dueDate"
                       required  :value="this.e_dueDate">
                       Grades: <input type="text" class="form-control" id="e_grades" name="grades"
                       required  :value="this.e_grades">


                   </div>
                   <div slot="footer">
                       <button class="btn btn-default" @click="showModal = false">
                       Cancel
                     </button>

                     <button class="btn btn-info" @click="editItem()">
                       Update
                     </button>
                   </div>
               </modal>


            </div>
          </div>
        </div>


      </div>



    </body>
</html>
