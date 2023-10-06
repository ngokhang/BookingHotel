<x-layout>
    <section class="container profile-content my-5">
        <div class="col-12 title mb-3 border-bottom pt-2 pb-4">
          <h1 href="#" class="fs-3">Manage account</h1>
        </div>
        <div class="wrapper row">
          <x-profile-sidebar-menu :avatar="$avatar" :fullname="$fullname" activeLink="true"/>
          <x-form-profile-update :dataUser="$dataUser"/>
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</x-layout>