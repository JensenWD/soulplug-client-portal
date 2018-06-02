@extends('master')

@section('body')
    <div class="container mt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="form-check-label pl-5 pl-md-3 col-md-6 offset-md-4">
                                    <input type="checkbox" class="form-check-input" required value="true">
                                    I agree to the terms & conditions
                                </label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-0 text-left mt-4 mt-lg-0"
                 style="max-height: 385px; overflow: auto">
                <div class="border rounded p-4">
                    <h4 class="font-weight-bold">SOUL PLUG CONSIGNMENT AGREEMENT</h4>
                    <p>
                        <strong>Terms and Conditions</strong>
                        Soul Plugs’ consignment fee is 10% of sale price or $20, whichever is greater, this fee is kept
                        by Soul Plug when your item sells. As a consigner you will receive the remainder of sales
                        proceeds less applicable expenses such as sales tax, cleaning or PayPal fees. Items that are
                        worn or not new (Deadstock) may require cleaning prior to being put on the sales floor. A
                        Cleaning fee of $5 will be charged which is either deducted from the amount you are to
                        receive when items sells, or will be due to Soul Plug if your unsold items is picked up. In
                        some cases, the cleaning fee could be more than $5 if more than standard cleaning is needed
                        to prepare your items for sale.
                        If and when the item sells, payment will be made no later than 5 business days after the end
                        of the consignment period via check or Paypal. Though we value your input, pricing is made
                        at the discretion of our pricing experts. Items will be priced at the going resale rate and
                        marked to sell. Our standard consignment term is 30 days. Consigners may be asked to pick
                        up unsold items or furnish a shipping label for your items return, or the item can be priced
                        and sold at the sole discretion of the Soul Plug staff. If your items are not picked up, or sold
                        with 60 days of the date on the consignment agreement the items may at that point become
                        the property of Soul Plug. If your item is removed from consignment before 30 days of the
                        date of the consignment request, then Soul Plug reserves the right to charge the 10% of
                        suggested selling price or $20 per item. In the event that is occurs it will be considered an
                        authentication and appraisal fee.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
