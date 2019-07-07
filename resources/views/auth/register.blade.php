@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('usuario_u') ? ' has-error' : '' }}">
                            <label for="usuario_u" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="usuario_u" type="text" class="form-control" name="usuario_u" value="{{ old('usuario_u') }}" required autofocus>

                                @if ($errors->has('usuario_u'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario_u') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email_u') ? ' has-error' : '' }}">
                            <label for="email_u" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email_u" type="email" class="form-control" name="email_u" value="{{ old('email_u') }}" required>

                                @if ($errors->has('email_u'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_u') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
