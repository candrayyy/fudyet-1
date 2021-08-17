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
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <label for="vehicle1"> I have a bike</label><br>
                                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                                <label for="vehicle2"> I have a car</label><br>
                                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                                <label for="vehicle3"> I have a boat</label><br><br>
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

   <script>
       $(() => {
           const $sections = $('.form-section');

           const navigateTo = (index) => {
               $sections.removeClass('current').eq(index).addClass('current');
               $('.form-navigation .previous').toggle(index>0);
               var atTheEnd = index >= $sections.length - 1;
               $('.form-navigation .next').toggle(!atTheEnd);
               $('.form-navigation [type=submit]').toggle(atTheEnd);
           }

           const curIndex = () =>
           {
               return $sections.index($sections.filter('.current'));
           }

           $('.form-navigation .previous').click(() => {
               navigateTo(curIndex()-1);
           })

           $('.form-navigation .next').click(() => {
                $('.recommendation-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(() => {
                    navigateTo(curIndex()+1);
                })
           })

           $sections.each((index,section) => {
               $(section).find(':input').attr('data-parsley-group', 'block-'+index);
           })

           navigateTo(0);
       })
   </script>

@endsection