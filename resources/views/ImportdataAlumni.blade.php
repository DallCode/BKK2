@extends('layouts.main')

@section('content')

<div class="container mt-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Import Data Excel</h4>
                </div>
                <div class="card-body">
                    @if ($message = session('alert'))
                        <div class="alert alert-{{ session('alert_type') }}">
                            {{ $message }}
                        </div>
                    @endif
                    <form id="importForm" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Upload Excel File</label>
                            <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Import</button>
                        <div id="loadingIndicator" class="d-none mt-3 text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <p>Processing...</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('file').addEventListener('change', function() {
        const fileName = this.value.split('\\').pop();
        this.nextElementSibling.innerHTML = fileName;
    });

    document.getElementById('importForm').addEventListener('submit', function() {
        document.getElementById('loadingIndicator').classList.remove('d-none');
        document.getElementById('submitBtn').disabled = true;
    });
</script>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 10px;
    }
    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    #loadingIndicator {
        position: relative;
        padding: 20px;
        background-color: #f1f1f1;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
</style>
@endsection
