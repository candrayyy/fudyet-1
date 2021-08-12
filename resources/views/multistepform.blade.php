@extends('apphome')

@section('title', 'Form')
@section('content')
   <section class="form-step">
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3">
                   <div class="card-header text-white bg-info">
                       <h5>Multi Step Form</h5>
                   </div>
                   <div class="card-body">
                       <form method="POST" action="{{route('form.formsubmit')}}" class="contact-form">
                           @csrf
                           <div class="form-section">
                               <label for="firstname">Firstname:</label>
                               <input type="text" name="firstname" class="form-control" id="" required>
                               <label for="firstname">Lastname:</label>
                               <input type="text" name="lastname" class="form-control" id="" required>
                           </div>

                            <div class="form-section">
                               <label for="firstname">Firstname:</label>
                               <input type="text" name="firstname" class="form-control" id="" required>
                               <label for="firstname">Lastname:</label>
                               <input type="text" name="lastname" class="form-control" id="" required>
                           </div>

                            <div class="form-section">
                               <label for="firstname">Firstname:</label>
                               <input type="text" name="firstname" class="form-control" id="" required>
                               <label for="firstname">Lastname:</label>
                               <input type="text" name="lastname" class="form-control" id="" required>
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
                $('.contact-form').parsley().whenValidate({
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