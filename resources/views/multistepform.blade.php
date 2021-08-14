@extends('apphome')

@section('title', 'Form')
@section('content')
   <section class="form-step">
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3 recommendation-wrapper-form">
                   <div class="card-header bg-transparent">
                       <h5>Recommendation Form</h5>
                   </div>
                   <div class="card-body">
                       <form method="POST" action="{{route('form.formsubmit')}}" class="recommendation-form">
                           @csrf
                           <div class="form-section">
                                <h5>Your Blood Type ?</h5>
                                <input type="radio" id="a" name="blood_type" value="1" required>
                                <label for="a">A</label><br>
                                <input type="radio" id="ab" name="blood_type" value="2">
                                <label for="ab">B</label><br>
                                <input type="radio" id="b" name="blood_type" value="3">
                                <label for="b">AB</label><br>
                                <input type="radio" id="o" name="blood_type" value="4">
                                <label for="o">O</label>
                           </div>

                           <div class="form-navigation">
                               <button type="button" class="previous btn btn-outline-info btn-multistep float-start">Previous</button>
                               <button type="button" class="next btn btn-info btn-multistep text-white float-end">Next</button>
                               <button type="submit" class="btn btn-success btn-multistep text-white float-end">Submit</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <script>
       $(function() {
           var $sections = $('.form-section');

           function navigateTo(index){
               $sections.removeClass('current').eq(index).addClass('current');
               $('.form-navigation .previous').toggle(index>0);
               var atTheEnd = index >= $sections.length - 1;
               $('.form-navigation .next').toggle(!atTheEnd);
               $('.form-navigation [type=submit]').toggle(atTheEnd);
           }

           function curIndex()
           {
               return $sections.index($sections.filter('.current'));
           }

           $('.form-navigation .previous').click(function() {
               navigateTo(curIndex()-1);
           })

           $('.form-navigation .next').click(function() {
                $('.recommendation-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex()+1);
                })
           })

           $sections.each(function(index,section) {
               $(section).find(':input').attr('data-parsley-group', 'block-'+index);
           })

           navigateTo(0);
       })
   </script>

@endsection