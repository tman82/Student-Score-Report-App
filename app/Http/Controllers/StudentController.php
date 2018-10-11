<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

  public function storeItem(Request $req) {
      $data = new Data();
      $data->firstName = $req->firstName;
      $data->lastName = $req->lastName;
      $data->assignmentName = $req->assignmentName;
      $data->dueDate = $req->dueDate;
      $data->grades = $req->grades;
      $data->save();

      return $data;
    }

    public function getItems(Request $req) {
      $data = Data::all();
      return $data;
    }

    public function editItem(Request $req, $id) {
      $data = Data::where('id', $id)->first();

      $data->firstName = $req->get('val1');
      $data->lastName = $req->get('val2');
      $data->assignmentName = $req->get('val3');
      $data->dueDate = $req->get('val4');
      $data->grades = $req->get('val5');
      return $data;
    }
}
