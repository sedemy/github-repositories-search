@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">GitHub Repositories ({{ count($repositories) }})</div>

                <div class="card-body">

                        <ol>
                            @foreach ($repositories as $repo )

                                <li>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <a href="{{ $repo->html_url }}" target="_blank">{{ $repo->html_url }}</a>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        </ol>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('/') }}" class="btn btn-primary">
                                    {{ __('Go back to get other Repositories') }}
                                </a>
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
