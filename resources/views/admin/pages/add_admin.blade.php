@extends('admin.layouts.default')
@section('title', 'Add Admin')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card vh-100">
                    <div class="card-body">
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeAdmin') }}" novalidate>
                            @csrf
                            <input type="hidden" name="role" required value="{{ user_roles('2')}}">
                            <input type="hidden" name="id"  value="{{ $admin['id'] ?? ''}}">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{  $admin['name'] ?? old('name') }}" class="form-control" id="name" required >
                                <div class="invalid-feedback">Please enter your name!</div>
                                @error('name')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $admin['email'] ?? old('email') }}" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter valid email!</div>
                                @error('email')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{  $admin['phone'] ?? old('phone') }}" class="form-control" id="phone" required>
                                <div class="invalid-feedback">Please enter valid Phone No!</div>
                                @error('phone')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required >
                                <div class="invalid-feedback">Please enter password!</div>
                                @error('password')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{  $admin['city'] ?? '' }}" id="city" required>
                                <div class="invalid-feedback">Please enter city name!</div>

                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select id="state"  name="state" class="form-select" >
                                    <option value="" selected>Choose...</option>
                                    <option value="LND">London, City of</option>
                                    <option value="ABE">Aberdeen City</option>
                                    <option value="ABD">Aberdeenshire</option>
                                    <option value="ANS">Angus</option>
                                    <option value="AGB">Argyll and Bute</option>
                                    <option value="CLK">Clackmannanshire</option>
                                    <option value="DGY">Dumfries and Galloway</option>
                                    <option value="DND">Dundee City</option>
                                    <option value="EAY">East Ayrshire</option>
                                    <option value="EDU">East Dunbartonshire</option>
                                    <option value="ELN">East Lothian</option>
                                    <option value="ERW">East Renfrewshire</option>
                                    <option value="EDH">Edinburgh, City of</option>
                                    <option value="ELS">Eilean Siar</option>
                                    <option value="FAL">Falkirk</option>
                                    <option value="FIF">Fife</option>
                                    <option value="GLG">Glasgow City</option>
                                    <option value="HLD">Highland</option>
                                    <option value="IVC">Inverclyde</option>
                                    <option value="MLN">Midlothian</option>
                                    <option value="MRY">Moray</option>
                                    <option value="NAY">North Ayrshire</option>
                                    <option value="NLK">North Lanarkshire</option>
                                    <option value="ORK">Orkney Islands</option>
                                    <option value="PKN">Perth and Kinross</option>
                                    <option value="RFW">Renfrewshire</option>
                                    <option value="SCB">Scottish Borders</option>
                                    <option value="ZET">Shetland Islands</option>
                                    <option value="SAY">South Ayrshire</option>
                                    <option value="SLK">South Lanarkshire</option>
                                    <option value="STG">Stirling</option>
                                    <option value="WDU">West Dunbartonshire</option>
                                    <option value="WLN">West Lothian</option>
                                    <option value="ANN">Antrim and Newtownabbey</option>
                                    <option value="AND">Ards and North Down</option>
                                    <option value="ABC">Armagh City, Banbridge and Craigavon</option>
                                    <option value="BFS">Belfast City</option>
                                    <option value="CCG">Causeway Coast and Glens</option>
                                    <option value="DRS">Derry and Strabane</option>
                                    <option value="FMO">Fermanagh and Omagh</option>
                                    <option value="LBC">Lisburn and Castlereagh</option>
                                    <option value="MEA">Mid and East Antrim</option>
                                    <option value="MUL">Mid-Ulster</option>
                                    <option value="NMD">Newry, Mourne and Down</option>
                                    <option value="BDG">Barking and Dagenham</option>
                                    <option value="BNE">Barnet</option>
                                    <option value="BEX">Bexley</option>
                                    <option value="BEN">Brent</option>
                                    <option value="BRY">Bromley</option>
                                    <option value="CMD">Camden</option>
                                    <option value="CRY">Croydon</option>
                                    <option value="EAL">Ealing</option>
                                    <option value="ENF">Enfield</option>
                                    <option value="GRE">Greenwich</option>
                                    <option value="HCK">Hackney</option>
                                    <option value="HMF">Hammersmith and Fulham</option>
                                    <option value="HRY">Haringey</option>
                                    <option value="HRW">Harrow</option>
                                    <option value="HAV">Havering</option>
                                    <option value="HIL">Hillingdon</option>
                                    <option value="HNS">Hounslow</option>
                                    <option value="ISL">Islington</option>
                                    <option value="KEC">Kensington and Chelsea</option>
                                    <option value="KTT">Kingston upon Thames</option>
                                    <option value="LBH">Lambeth</option>
                                    <option value="LEW">Lewisham</option>
                                    <option value="MRT">Merton</option>
                                    <option value="NWM">Newham</option>
                                    <option value="RDB">Redbridge</option>
                                    <option value="RIC">Richmond upon Thames</option>
                                    <option value="SWK">Southwark</option>
                                    <option value="STN">Sutton</option>
                                    <option value="TWH">Tower Hamlets</option>
                                    <option value="WFT">Waltham Forest</option>
                                    <option value="WND">Wandsworth</option>
                                    <option value="WSM">Westminster</option>
                                    <option value="BNS">Barnsley</option>
                                    <option value="BIR">Birmingham</option>
                                    <option value="BOL">Bolton</option>
                                    <option value="BRD">Bradford</option>
                                    <option value="BUR">Bury</option>
                                    <option value="CLD">Calderdale</option>
                                    <option value="COV">Coventry</option>
                                    <option value="DNC">Doncaster</option>
                                    <option value="DUD">Dudley</option>
                                    <option value="GAT">Gateshead</option>
                                    <option value="KIR">Kirklees</option>
                                    <option value="KWL">Knowsley</option>
                                    <option value="LDS">Leeds</option>
                                    <option value="LIV">Liverpool</option>
                                    <option value="MAN">Manchester</option>
                                    <option value="NET">Newcastle upon Tyne</option>
                                    <option value="NTY">North Tyneside</option>
                                    <option value="OLD">Oldham</option>
                                    <option value="RCH">Rochdale</option>
                                    <option value="ROT">Rotherham</option>
                                    <option value="SLF">Salford</option>
                                    <option value="SAW">Sandwell</option>
                                    <option value="SFT">Sefton</option>
                                    <option value="SHF">Sheffield</option>
                                    <option value="SOL">Solihull</option>
                                    <option value="STY">South Tyneside</option>
                                    <option value="SHN">St. Helens</option>
                                    <option value="SKP">Stockport</option>
                                    <option value="SND">Sunderland</option>
                                    <option value="TAM">Tameside</option>
                                    <option value="TRF">Trafford</option>
                                    <option value="WKF">Wakefield</option>
                                    <option value="WLL">Walsall</option>
                                    <option value="WGN">Wigan</option>
                                    <option value="WRL">Wirral</option>
                                    <option value="WLV">Wolverhampton</option>
                                    <option value="BKM">Buckinghamshire</option>
                                    <option value="CAM">Cambridgeshire</option>
                                    <option value="CMA">Cumbria</option>
                                    <option value="DBY">Derbyshire</option>
                                    <option value="DEV">Devon</option>
                                    <option value="DOR">Dorset</option>
                                    <option value="ESX">East Sussex</option>
                                    <option value="ESS">Essex</option>
                                    <option value="GLS">Gloucestershire</option>
                                    <option value="HAM">Hampshire</option>
                                    <option value="HRT">Hertfordshire</option>
                                    <option value="KEN">Kent</option>
                                    <option value="LAN">Lancashire</option>
                                    <option value="LEC">Leicestershire</option>
                                    <option value="LIN">Lincolnshire</option>
                                    <option value="NFK">Norfolk</option>
                                    <option value="NYK">North Yorkshire</option>
                                    <option value="NTH">Northamptonshire</option>
                                    <option value="NTT">Nottinghamshire</option>
                                    <option value="OXF">Oxfordshire</option>
                                    <option value="SOM">Somerset</option>
                                    <option value="STS">Staffordshire</option>
                                    <option value="SFK">Suffolk</option>
                                    <option value="SRY">Surrey</option>
                                    <option value="WAR">Warwickshire</option>
                                    <option value="WSX">West Sussex</option>
                                    <option value="WOR">Worcestershire</option>
                                    <option value="BAS">Bath and North East Somerset</option>
                                    <option value="BDF">Bedford</option>
                                    <option value="BBD">Blackburn with Darwen</option>
                                    <option value="BPL">Blackpool</option>
                                    <option value="BGW">Blaenau Gwent</option>
                                    <option value="BCP">Bournemouth, Christchurch and Poole</option>
                                    <option value="BRC">Bracknell Forest</option>
                                    <option value="BGE">Bridgend [Pen-y-bont ar Ogwr GB-POG]</option>
                                    <option value="BNH">Brighton and Hove</option>
                                    <option value="BST">Bristol, City of</option>
                                    <option value="CAY">Caerphilly [Caerffili GB-CAF]</option>
                                    <option value="CRF">Cardiff [Caerdydd GB-CRD]</option>
                                    <option value="CMN">Carmarthenshire [Sir Gaerfyrddin GB-GFY]</option>
                                    <option value="CBF">Central Bedfordshire</option>
                                    <option value="CGN">Ceredigion [Sir Ceredigion]</option>
                                    <option value="CHE">Cheshire East</option>
                                    <option value="CHW">Cheshire West and Chester</option>
                                    <option value="CWY">Conwy</option>
                                    <option value="CON">Cornwall</option>
                                    <option value="DAL">Darlington</option>
                                    <option value="DEN">Denbighshire [Sir Ddinbych GB-DDB]</option>
                                    <option value="DER">Derby</option>
                                    <option value="DUR">Durham, County</option>
                                    <option value="ERY">East Riding of Yorkshire</option>
                                    <option value="FLN">Flintshire [Sir y Fflint GB-FFL]</option>
                                    <option value="GWN">Gwynedd</option>
                                    <option value="HAL">Halton</option>
                                    <option value="HPL">Hartlepool</option>
                                    <option value="HEF">Herefordshire</option>
                                    <option value="AGY">Isle of Anglesey [Sir Ynys Môn GB-YNM]</option>
                                    <option value="IOW">Isle of Wight</option>
                                    <option value="IOS">Isles of Scilly</option>
                                    <option value="KHL">Kingston upon Hull</option>
                                    <option value="LCE">Leicester</option>
                                    <option value="LUT">Luton</option>
                                    <option value="MDW">Medway</option>
                                    <option value="MTY">Merthyr Tydfil [Merthyr Tudful GB-MTU]</option>
                                    <option value="MDB">Middlesbrough</option>
                                    <option value="MIK">Milton Keynes</option>
                                    <option value="MON">Monmouthshire [Sir Fynwy GB-FYN]</option>
                                    <option value="NTL">Neath Port Talbot [Castell-nedd Port Talbot GB-CTL]</option>
                                    <option value="NWP">Newport [Casnewydd GB-CNW]</option>
                                    <option value="NEL">North East Lincolnshire</option>
                                    <option value="NLN">North Lincolnshire</option>
                                    <option value="NSM">North Somerset</option>
                                    <option value="NBL">Northumberland</option>
                                    <option value="NGM">Nottingham</option>
                                    <option value="PEM">Pembrokeshire [Sir Benfro GB-BNF]</option>
                                    <option value="PTE">Peterborough</option>
                                    <option value="PLY">Plymouth</option>
                                    <option value="POR">Portsmouth</option>
                                    <option value="POW">Powys</option>
                                    <option value="RDG">Reading</option>
                                    <option value="RCC">Redcar and Cleveland</option>
                                    <option value="RCT">Rhondda Cynon Taff [Rhondda CynonTaf]</option>
                                    <option value="RUT">Rutland</option>
                                    <option value="SHR">Shropshire</option>
                                    <option value="SLG">Slough</option>
                                    <option value="SGC">South Gloucestershire</option>
                                    <option value="STH">Southampton</option>
                                    <option value="SOS">Southend-on-Sea</option>
                                    <option value="STT">Stockton-on-Tees</option>
                                    <option value="STE">Stoke-on-Trent</option>
                                    <option value="SWA">Swansea [Abertawe GB-ATA]</option>
                                    <option value="SWD">Swindon</option>
                                    <option value="TFW">Telford and Wrekin</option>
                                    <option value="THR">Thurrock</option>
                                    <option value="TOB">Torbay</option>
                                    <option value="TOF">Torfaen [Tor-faen]</option>
                                    <option value="VGL">Vale of Glamorgan, The [Bro Morgannwg GB-BMG]</option>
                                    <option value="WRT">Warrington</option>
                                    <option value="WBK">West Berkshire</option>
                                    <option value="WIL">Wiltshire</option>
                                    <option value="WNM">Windsor and Maidenhead</option>
                                    <option value="WOK">Wokingham</option>
                                    <option value="WRX">Wrexham [Wrecsam GB-WRC]</option>
                                    <option value="YOR">York</option>
                                </select>
                                <div class="invalid-feedback">Please select state!</div>
                            </div>
                            
                            <div class="col-md-2">
                                <label for="zip_code" class="form-label">Zip</label>
                                <input type="text" name="zip_code" value="{{  $admin['zip_code'] ?? '' }}" class="form-control" id="zip_code" required>
                                <div class="invalid-feedback">Please enter  zip code.</div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ $admin['address'] ?? old('address') }}" class="form-control" id="address" placeholder="enter your addess" required>
                                <div class="invalid-feedback">Please enter address</div>
                                @error('address')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce