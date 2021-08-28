@extends('apphome')

@section('title', 'Form')
@section('content')
   <section class="form-step">
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3 recommendation-wrapper-form">
                   <div class="card-body">
                       <form method="POST" action="{{route('form.formsubmit')}}" class="recommendation-form">
                           @csrf
                           <!--hard code cuz DB design issue-->
                           <div class="form-section">
                                <h4 class="mb-5">Your blood type ?</h4>
                                <input type="radio" class="question-circle-radio question-radio-label" id="a" name="blood_type" value="1" required>
                                <label for="a" class="question-button-label"><div class="blood-icon"><i class="bi bi-droplet"></i></div>A</label>
                                <input type="radio" class="question-circle-radio question-radio-label" id="ab" name="blood_type" value="2">
                                <label for="ab" class="question-button-label"><div class="blood-icon"><i class="bi bi-droplet"></i></div>B</label>
                                <input type="radio" class="question-circle-radio question-radio-label" id="b" name="blood_type" value="3">
                                <label for="b" class="question-button-label"><div class="blood-icon"><i class="bi bi-droplet"></i></div>AB</label>
                                <input type="radio" class="question-circle-radio question-radio-label" id="o" name="blood_type" value="4">
                                <label for="o" class="question-button-label"><div class="blood-icon"><i class="bi bi-droplet"></i></div>O</label>
                           </div>

                           <div class="form-section">
                                <h4 class="mb-5">Do you have any food allergies ?</h4>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="cowsmilk" name="cowsmilk_free" value="1">
                                <label for="cowsmilk" class="question-button-label"><div class="cowsmilk-icon"><img src="{{asset('png/icons8-dairy-50.png')}}" alt=""></div>Cow's Milk-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="egg" name="egg_free" value="2">
                                <label for="egg" class="question-button-label"><div class="egg-icon"><img src="{{asset('png/icons8-no-eggs-50.png')}}" alt=""></div>Egg-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="treenut" name="treenut_free" value="1">
                                <label for="treenut" class="question-button-label"><div class="treenut-icon"><img src="{{asset('png/icons8-no-nuts-50.png')}}" alt=""></div>Tree Nut-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="peanut" name="peanut_free" value="2">
                                <label for="peanut" class="question-button-label"><div class="peanut-icon"><img src="{{asset('png/icons8-peanut-50.png')}}" alt=""></div>Peanut-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="shellfish" name="shellfish_free" value="1">
                                <label for="shellfish" class="question-button-label"><div class="shellfish-icon"><img src="{{asset('png/icons8-no-shellfish-50.png')}}" alt=""></div>Shellfish-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="wheat" name="wheat_free" value="2">
                                <label for="wheat" class="question-button-label"><div class="wheat-icon"><img src="{{asset('png/icons8-no-gluten-50.png')}}" alt=""></div>Wheat-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="soy" name="soy_free" value="1">
                                <label for="soy" class="question-button-label"><div class="soy-icon"><img src="{{asset('png/icons8-no-soy-50.png')}}" alt=""></div>Soy-Free</label>
                                <input type="checkbox" class="question-square-checkbox question-checkbox-label" id="fish" name="fish_free" value="2">
                                <label for="fish" class="question-button-label"><div class="fish-icon"><img src="{{asset('png/icons8-no-fish-50.png')}}" alt=""></div>Fish-Free</label>
                           </div>

                           <div class="form-navigation">
                               <button type="button" class="previous btn btn-outline-info btn-multistep float-start mb-4 mt-5">Previous</button>
                               <button type="button" class="next btn btn-info btn-multistep text-white float-end mb-4 mt-5">Next</button>
                               <button type="submit" class="btn btn-success btn-multistep text-white float-end mb-4 mt-5">Submit</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <script src="{{asset('js/multistepform.js')}}"></script>

@endsection