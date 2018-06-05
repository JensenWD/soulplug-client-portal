@extends('master')

@section('body')
    <div class="container mt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-7">
                <div class="card border-dark">
                    <div class="card-header bg-dark text-white">Register</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mb-1">
                                <label for="name"
                                       class="col-12 offset-lg-2 col-lg-8 col-form-label">{{ __('Name') }}</label>

                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <input id="name" type="text"
                                           class="border-dark form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="email"
                                       class="col-12 offset-lg-2 col-lg-8 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <input id="email" type="email"
                                           class="border-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="addr"
                                       class="col-12 offset-lg-2 col-lg-8 col-form-label">Address</label>

                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <input type="text" class="border-dark form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}"
                                           name="addr" value="{{ old('addr') }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="city" class="col-6 col-lg-4 offset-lg-2 col-form-label pr-1">City</label>
                                <label for="zip" class="col-6 col-lg-4 col-form-label pl-1">Zip</label>
                                <div class="col-6 col-lg-4 offset-lg-2 pr-1">
                                    <input type="text" required
                                           class="border-dark form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           name="city" value="{{ old('city') }}">
                                </div>
                                <div class="col-6 col-lg-4 pl-1">
                                    <input type="number" required class="border-dark form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"
                                           name="zip" value="{{ old('zip') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="state" class="col-6 col-lg-4 offset-lg-2 col-form-label pr-1">State</label>
                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <select name="state" required class="custom-select border-dark">
                                        <option class="text-muted" value="">Make a selection</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District Of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="password"
                                       class="border-dark col-12 offset-lg-2 col-lg-8 col-form-label">{{ __('Password') }}</label>

                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <input id="password" type="password"
                                           class="border-dark form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label for="password-confirm"
                                       class="col-12 offset-lg-2 col-lg-8 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-12 offset-lg-2 col-lg-8">
                                    <input id="password-confirm" type="password" class="border-dark form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="form-check-label col-11 offset-1 offset-lg-2">
                                    <input type="checkbox" class="form-check-input" required value="true">
                                    I agree to the terms & conditions
                                </label>
                            </div>

                            <div class="form-group row mb-1 mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-outline-dark">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 offset-lg-0 text-left mt-4 mt-lg-0">
                <div class="border border-dark rounded p-4" style="max-height: 525px; overflow: auto">
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
