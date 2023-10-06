<x-layout>
  <section class="container profile-content my-5">
    <div class="col-12 title mb-3 border-bottom pt-2 pb-4">
      <h1 href="#" class="fs-3">Manage account</h1>
    </div>
    <div class="wrapper row">
      <x-profile-sidebar-menu :avatar="$avatar" :fullname="$fullname"/>
      <x-form-change-password :dataUser="$dataUser" />    
    </div>
  </section>
</x-layout>