<h2>Restore User Account</h2>

@if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger text-center">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('restore.user') }}">
    @csrf
    <div class="form-group">
        <label for="email">Enter Email of the Account to Restore:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Restore Account</button>
</form>
