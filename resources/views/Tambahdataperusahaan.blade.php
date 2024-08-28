@extends('layouts.main')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Form Tambah Perusahaan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tambahdataperusahaan') }}" method="POST">
                        @csrf
                        <!-- Nama Perusahaan -->
                        <div class="form-group mb-3">
                            <label for="nama">Nama Perusahaan:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>

                        <!-- Bidang Usaha -->
                        <div class="form-group mb-3">
                            <label for="bidang_usaha">Bidang Usaha:</label>
                            <input type="text" id="bidang_usaha" name="bidang_usaha" class="form-control" required>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="form-group mb-3">
                            <label for="no_telepon">Nomor Telepon:</label>
                            <input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="3" class="form-control" required></textarea>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>


                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-right">
                            <input type="submit" value="Tambah Perusahaan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show notify on success
    @if (session('success'))
           $.notify({
               title: '<strong>Success</strong>',
               message: "{{ session('success') }}"
           },{
               type: 'success',
               placement: {
                   from: "top",
                   align: "right"
               },
               delay: 5000,
               timer: 1000
           });
       @endif
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var bidangUsahaSelect = document.getElementById('bidang_usaha');
        var bidangUsahaLainnya = document.getElementById('bidangUsahaLainnya');

        bidangUsahaSelect.addEventListener('change', function() {
            if (this.value === 'lainnya') {
                bidangUsahaLainnya.style.display = 'block';
                bidangUsahaLainnya.querySelector('input').required = true; // Set input required
            } else {
                bidangUsahaLainnya.style.display = 'none';
                bidangUsahaLainnya.querySelector('input').required = false; // Unset input required
            }
        });

        // Trigger change event to set initial state
        bidangUsahaSelect.dispatchEvent(new Event('change'));

        // Toggle password visibility
        var passwordInput = document.getElementById('password');
        var togglePasswordButton = document.getElementById('togglePassword');
        var isPasswordVisible = false;

        togglePasswordButton.addEventListener('click', function() {
            isPasswordVisible = !isPasswordVisible;
            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            togglePasswordButton.innerHTML = isPasswordVisible ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
        });
    });
</script>
@endsection
