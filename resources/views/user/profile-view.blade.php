<x-layout>

    <form action="" method="post">
        @csrf
        @method('PUT')
        <div class="">
            <label class="">IMAGE</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        
            <!-- error message untuk image -->
            @error('image')
                <div class="">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="">
            <label class="">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $field->name) }}" placeholder="Masukkan Nama">
        
            <!-- error message untuk title -->
            @error('name')
                <div class="">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="">
            <label class="">Email</label>
            <input type="email" class="form-control @error('Email') is-invalid @enderror" name="email" value="{{ old('email', $field->email) }}" placeholder="Masukan Email Baru">
        
            <!-- error message untuk description -->
            @error('email')
                <div class="">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="">
            <div class="">
                <div class="">
                    <label class="">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $field->username) }}" placeholder="Masukkan Username">
                
                    <!-- error message untuk price -->
                    @error('username')
                        <div class="">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="">
                <div class="">
                    <label class="">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $field->password) }}" placeholder="Masukkan password baru">
                
                    <!-- error message untuk stock -->
                    @error('password')
                        <div class="">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        

    </form>

</x-layout>