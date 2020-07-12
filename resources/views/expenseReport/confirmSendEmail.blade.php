@extends ('layouts.app')

@section ('content')
    <div class="row">
        <div class="col">
            <h1>Send report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <!--  <div class="alert alert-danger">Error</div> Muestra error si hay-->
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form action="/expense_reports/{{$report->id}}/sendEmail" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Type an email" value="{{old('email')}}">
                </div>
                <button class="btn btn-primary" type="submit"> Send email </button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection

