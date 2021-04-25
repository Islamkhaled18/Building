    @csrf

    <div class="form-group row">
        
        <div class="col-md-8">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="اسم المستخدم">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="name" class="col-md-2 col-form-label text-md-right">اسم المستخدم</label>
    </div>

    <div class="form-group row">
        <div class="col-md-8">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الالكتروني">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="email" class="col-md-2 col-form-label text-md-right">البريد الإلكتروني</label>
    </div>

    <div class="form-group row">


        <div class="col-md-8">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمة السر">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="password" class="col-md-2 col-form-label text-md-right">كلمة السر</label>
    </div>

    <div class="form-group row">
        <div class="col-md-8">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة السر">
        </div>
        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">تأكيد كلمة السر</label>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                تسجيل العضوية
            </button>
        </div>
    </div>
</form>