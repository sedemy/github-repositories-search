@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generate GitHub endpoint</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('show-result') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Language') }}</label>

                            <div class="col-md-6">

                                <select name="language" class="form-control" @error('language') is-invalid @enderror"  required>
                                    <option value="PHP">PHP</option>
                                    <option value="PYTHON">PYTHON</option>
                                    <option value="NODEJS">NODEJS</option>
                                    <option value="ASP">ASP</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="created" class="col-md-4 col-form-label text-md-right">{{ __('Created') }}</label>

                            <div class="col-md-6">
                                <input id="created" name="created" type="text" readonly class="form-control @error('created') is-invalid @enderror" value="{{  date('Y-m-d',strtotime('-3 year')) }}" required>

                                @error('created')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sort" class="col-md-4 col-form-label text-md-right">{{ __('Sort by') }}</label>

                            <div class="col-md-6">

                                <select name="sort" class="form-control" @error('sort') is-invalid @enderror"  required>
                                    <option value="stars">stars</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>

                            <div class="col-md-6">

                                <select name="order" class="form-control" @error('order') is-invalid @enderror"  required>
                                    <option value="desc">Desc</option>
                                    <option value="asc">Asc</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="per_page" class="col-md-4 col-form-label text-md-right">{{ __('Count of repo') }}</label>

                            <div class="col-md-6">

                                <select name="per_page" class="form-control" @error('per_page') is-invalid @enderror"  required>
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Get Repositories') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>


    <script>
        $('#created').datepicker({format: 'yyyy-mm-dd', autoclose: true});
    </script>
@endpush
