@extends('public.layouts.parent')

@section('title', "Rent Contract | Move Right®")

@section('content')
    
    <link rel="stylesheet" href="{{ asset("css/snipped.css") }}">
    <style>
        .theme-main-menu.menu-overlay{
            position: relative;
        }

        .file-container {
            position: relative;
            margin-bottom: 20px;
        }

        .file-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
        }

        .file-preview {
            display: none;
            max-width: 100%;
            border-bottom: 1px dashed #ccc; /* Add dash border */
            margin-top: 5px;
        }

        .big-blue-button {
            display: inline-block;
            padding: 20px 40px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .big-blue-button:hover {
            background-color: #0056b3;
        }
    </style>
    <div id="outputPage" class="snipcss-nPzl5">
        <form action="{{ route("buyers.contracts.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="landlord_id" value="{{ $property->landlord->id }}">
            <input type="hidden" name="property_id" value="{{ $property->id }}">
            <input type="hidden" name="buyer_id" value="{{ $buyer->id }}">
            <input type="hidden" name="list_in" value="{{ $property->list_in }}">

            <div data-exp="simple2" class="outputVersion1 template_GENERIC templated">
                <div id="style-wmVyj" class="style-wmVyj">
                    <div class=" header">
                        <span class="content">Tenancy Agreement</span>
                        <span class="pageNumbers">Page <span class="currentPageNum"></span> of <span class="totalPageNum"></span></span>
                    </div>
                    <div class=" footer"></div>
                    <div class=" firstHeader"></div>
                    <div class=" firstFooter">
                        <span class="pageNumbers">Page <span class="currentPageNum"></span> of <span class="totalPageNum"></span></span>
                    </div>
                    <div>
                        <h1>Assured Shorthold Tenancy Agreement</h1>
                        <p id="style-oroAo" class="style-oroAo"><strong>THIS AGREEMENT </strong>dated this {{ date('jS') }} day of {{ date('F') }}, {{ date('Y') }} (the "Agreement"). </p>
                        <div class="partiesContainer">
                            <div class="parties">
                                <div class="single">
                                    <h2> Landlord </h2>
                                    <div class="detail">
                                        <span class="name">{{ $property->landlord->name }}</span>
                                    </div><span class="titleSentence">(the "Landlord")</span>
                                </div>
                                <div class="single">
                                    <h2> Tenant </h2>
                                    <div class="detail">
                                        <span class="name">{{ $buyer->name }}</span>
                                    </div><span class="titleSentence">(the "Tenant")</span>
                                </div>
                            </div>
                        </div>
                        <p id="style-okdjo" class="style-okdjo">(individually the “Party” and collectively the “Parties”) </p>
                        <p id="style-ZvIdW" class="style-ZvIdW"><strong>IN CONSIDERATION OF </strong>the Landlord leasing certain premises to the Tenant and other valuable consideration, the receipt and sufficiency of which consideration is hereby acknowledged, the Parties agree as follows: </p>
                        <p id="style-ej2mK" class="style-ej2mK"><strong>BACKGROUND:</strong>
                        </p>
                        <ol start="1">
                            <li value="1" id="style-I1FvM" class="style-I1FvM"><span>This is an agreement to create an Assured Shorthold Tenancy as defined in Section 19A of the Housing Act 1988 or any successor legislation as supplemented or amended from time to time and any other applicable and relevant laws and regulations.</span><br>
                            </li>
                            <li value="2" id="style-cnlNa" class="style-cnlNa"><span>The Landlord is the owner of residential property available for rent and is legally entitled to grant this tenancy.</span><br>
                            </li>
                        </ol>
                        <div class=" body">
                            <p id="style-g2xxN" class="style-g2xxN"><strong>AGREEMENT:</strong>
                            </p>
                            <ol start="1">
                                <li class="lh style-H1oPE" id="style-H1oPE"><strong><u><span>Let Property</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="1" id="style-ccGcp" class="style-ccGcp"><span>The Landlord agrees to let to the Tenant, and the Tenant agrees to take a tenancy of the house, known as and forming {{ $property->address }} (the "Property"), for use as residential premises only. </span><br>
                                </li>
                                <li value="2" id="style-LkZTT" class="style-LkZTT"><span>Smoking is permitted on the Property. The Tenant will be responsible for all damage caused by smoking including, but not limited to, stains, burns, odours and removal of debris.</span><br>
                                </li>
                                <li class="lh style-WvFtB" id="style-WvFtB"><strong><u><span>Term</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="3" id="style-k4MYr" class="style-k4MYr"><span>The term of the tenancy commences on <input type="date" name="from" value="{{ date('Y-m-d') }}" readonly>  and ends on <input type="date" name="to" required> (the "Term").</span><br>
                                </li>
                                <li value="4" id="style-BowrC" class="style-BowrC"><span>Should neither party have brought the Tenancy to an end at or before the expiry of the Term, then a new tenancy from month to month will be created between the Landlord and the Tenant which will be subject to all the terms and conditions of this Agreement but will be terminable upon the Landlord giving the Tenant the notice required under the applicable legislation of England (the "Act").</span><br>
                                </li>
                                <li class="lh style-pNN3m" id="style-pNN3m"><strong><u><span>Rent</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="5" id="style-s32Bn" class="style-s32Bn"><span>Subject to the provisions of this Agreement, the rent for the Property is £{{ $property->price }}</span> per month (the "Rent").<br>
                                </li>
                                <li value="6" id="style-S1mW5" class="style-S1mW5"><span>The Tenant will pay the Rent in advance, on or before the first of each and every month of the Term to the Landlord at {{ $property->landlord->location->area->name }}, {{ $property->location->city->name }}, UK or at such other place as the Landlord may later designate by cash or electronic payment using an online money transfer service.</span><br>
                                </li>
                                <li class="lh style-yK5VR" id="style-yK5VR"><strong><u><span>Tenant Improvements</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="7" id="style-gPchh" class="style-gPchh"><span>The Tenant will obtain written permission from the Landlord before doing any of the following:</span><br>
                                    <ol start="1">
                                        <li value="1"><span>applying adhesive materials, or inserting nails or hooks in walls or ceilings other than two small picture hooks per wall;</span><br>
                                        </li>
                                        <li value="2"><span>painting, wallpapering, redecorating or in any way significantly altering the appearance of the Property;</span><br>
                                        </li>
                                        <li value="3"><span>removing or adding walls, or performing any structural alterations;</span><br>
                                        </li>
                                        <li value="4"><span>installing a waterbed(s);</span><br>
                                        </li>
                                        <li value="5"><span>changing the amount of heat or power normally used on the Property as well as installing additional electrical wiring or heating units;</span><br>
                                        </li>
                                        <li value="6"><span>placing or exposing or allowing to be placed or exposed anywhere inside or outside the Property any placard, notice or sign for advertising or any other purpose; or </span><br>
                                        </li>
                                        <li value="7"><span>affixing to or erecting upon or near the Property any radio or TV antenna or tower.</span><br>
                                        </li>
                                    </ol>
                                </li>
                                <li class="lh style-pE9FS" id="style-pE9FS"><strong><u><span>Utilities and Other Charges</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="8" id="style-LZfvf" class="style-LZfvf"><span>The Tenant is responsible for the payment of all utilities in relation to the Property.</span><br>
                                </li>
                                <li class="lh style-lg8Va" id="style-lg8Va"><strong><u><span>Insurance</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="9" id="style-17bHx" class="style-17bHx"><span>The Tenant is hereby advised and understands that the personal property of the Tenant is not insured by the Landlord for either damage or loss, and the Landlord assumes no liability for any such loss.</span><br>
                                </li>
                                <li class="lh style-VrCQO" id="style-VrCQO"><strong><u><span>Absences</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="10" id="style-cJz9o" class="style-cJz9o"><span>The Tenant will inform the Landlord if the Tenant is to be absent from the Property for any reason for a period of more than twenty-eight (28) days. The Tenant agrees to take such measures to secure the Property prior to such absence as the Landlord may reasonably require and take appropriate measures to prevent frost or flood damage.</span><br>
                                </li>
                                <li value="11" id="style-C34zV" class="style-C34zV"><span>If the Tenant no longer occupies the Property as its only principal home (whether or not the Tenant intends to return) the Landlord may, at its option, end the tenancy by serving a Notice to Quit that complies with the Act.</span><br>
                                </li>
                                <li value="12" id="style-oxzZ5" class="style-oxzZ5"><span>If the Tenant has abandoned the Property and the Landlord is unsure whether the Tenant intends to return, the Landlord is entitled to apply for a court order for possession.</span><br>
                                </li>
                                <li value="13" id="style-aAVIY" class="style-aAVIY"><span>If the Tenant has abandoned or surrendered the Property and the Landlord feels that the Property is in an insecure or urgent condition, or that electrical or gas appliances could cause damage or danger to the Property then the Landlord may enter the Property to carry out urgent repairs. If the locks have been changed for such urgent security reasons, the Landlord must attempt to provide notice to the Tenant of the change in locks and how they can get a new key.</span><br>
                                </li>
                                <li value="14" id="style-vHhow" class="style-vHhow"><span>If there is implied or actual surrender of the Property by the Tenant, the Landlord may, at its option, enter the Property by any means without being liable for any prosecution for such entering, and without becoming liable to the Tenant for damages or for any payment of any kind whatever, and may, at the Landlord's discretion, as agent for the Tenant, let the Property, or any part of the Property, for the whole or any part of the then unexpired term, and may receive and collect all rent payable by virtue of such letting, and, at the Landlord's option, hold the Tenant liable for any difference between the Rent that would have been payable under this Agreement during the balance of the unexpired term, if this Agreement had continued in force, and the net rent for such period realised by the Landlord by means of the letting. Implied surrender will be deemed if the Tenant has left the keys behind or where the Tenant has ceased to occupy the Property and clearly does not intend to return.</span><br>
                                </li>
                                <li value="15" id="style-ymEjU" class="style-ymEjU"><span>If the Tenant has abandoned or surrendered the Property and the Tenant has left some belongings on the Property, the Landlord will store the Tenant's possessions with reasonable care for a reasonable period of time taking into consideration the value of the items and cost to store them. Once the cost of storage is greater than the value of the items, such items may be disposed of by the Landlord.</span><br>
                                </li>
                                <li class="lh style-lBXQC" id="style-lBXQC"><strong><u><span>Governing Law</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="16" id="style-bMNsA" class="style-bMNsA"><span>This Agreement will be construed in accordance with and governed by the laws of England and the Parties submit to the exclusive jurisdiction of the English Courts.</span><br>
                                </li>
                                <li class="lh style-DxUSi" id="style-DxUSi"><strong><u><span>Severability</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="17" id="style-L8yzX" class="style-L8yzX"><span>If there is a conflict between any provision of this Agreement and the Act, the Act will prevail and such provisions of the Agreement will be amended or deleted as necessary in order to comply with the Act. Further, any provisions that are required by the Act are incorporated into this Agreement.</span><br>
                                </li>
                                <li value="18" id="style-m5Vif" class="style-m5Vif"><span>The invalidity or unenforceability of any provisions of this Agreement will not affect the validity or enforceability of any other provision of this Agreement. &nbsp;Such other provisions remain in full force and effect.</span><br>
                                </li>
                                <li class="lh style-6l1H8" id="style-6l1H8"><strong><u><span>Amendment of Agreement</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="19" id="style-QZv1P" class="style-QZv1P"><span>This Agreement may only be amended or modified by a written document executed by the Parties.</span><br>
                                </li>
                                <li class="lh style-VMzm9" id="style-VMzm9"><strong><u><span>Assignment and Subletting</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="20" id="style-OmN7S" class="style-OmN7S"><span>The Tenant will not assign this Agreement, or sublet or grant any concession or licence to use the Property or any part of the Property. Any assignment, subletting, concession, or licence, whether by operation of law or otherwise, will be void and will, at the Landlord's option, terminate this Agreement.</span><br>
                                </li>
                                <li class="lh style-41UqB" id="style-41UqB"><strong><u><span>Damage to Property</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="21" id="style-MCDD3" class="style-MCDD3"><span>If the Property should be damaged other than by the Tenant's negligence or wilful act or that of the Tenant's employee, family, agent, or visitor and the Landlord decides not to rebuild or repair the Property, the Landlord may end this Agreement by giving appropriate notice.</span><br>
                                </li>
                                <li class="lh style-tDveR" id="style-tDveR"><strong><u><span>Care and Use of Property</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="22" id="style-6ojCt" class="style-6ojCt"><span>The Tenant will promptly notify the Landlord of any damage, or of any situation that may significantly interfere with the normal use of the Property.</span><br>
                                </li>
                                <li value="23" id="style-slkVT" class="style-slkVT"><span>The Tenant will keep the Property in good repair and condition and in good decorative order.</span><br>
                                </li>
                                <li value="24" id="style-s6NYq" class="style-s6NYq"><span>The Tenant or anyone living with the Tenant will not engage in any illegal trade or activity on or about the Property including, but not limited to, using the Property for drug storage, drug dealing, prostitution, illegal gambling or illegal drinking.</span><br>
                                </li>
                                <li value="25" id="style-I9k3l" class="style-I9k3l"><span>The Parties will comply with standards of health, sanitation, fire, housing and safety as required by law.</span><br>
                                </li>
                                <li value="26" id="style-LszOa" class="style-LszOa"><span>If the Tenant is absent from the Property and the Property is unoccupied for a period of twenty-eight (28) consecutive days or longer, the Tenant will arrange for regular inspection by a competent person. The Landlord will be notified in advance as to the name, address and phone number of this said person.</span><br>
                                </li>
                                <li value="27" id="style-DlC1Z" class="style-DlC1Z"><span>At the expiration of the Term, the Tenant will quit and surrender the Property in as good a state and condition as they were at the commencement of this Agreement, with reasonable wear and tear and reasonable damages by the elements excepted.</span><br>
                                </li>
                                <li class="lh style-maMUm" id="style-maMUm"><strong><u><span>Rules and Regulations</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="28" id="style-T5Xye" class="style-T5Xye"><span>The Tenant agrees to obey all reasonable rules and regulations implemented by the Landlord from time to time regarding the use and care of the Property and of the building, which will include any car park and common parts or facilities provided for the use of the Tenant and other neighbouring proprietors.</span><br>
                                </li>
                                <li class="lh style-I1WFb" id="style-I1WFb"><strong><u><span>Termination of Tenancy</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="29" id="style-kbkEC" class="style-kbkEC"><span>The Landlord may terminate the tenancy by service on the Tenant of a notice pursuant to any ground provided under the Act. The Landlord may serve such notice either:</span><br>
                                    <ol start="1">
                                        <li value="1"><span>to terminate the tenancy at its end date (e.g. a Section 21 notice to quit),</span><br>
                                        </li>
                                        <li value="2"><span>to terminate the tenancy where the Tenant has broken or not performed any of his obligations under this Agreement (e.g. a Section 8 notice of seeking possession), or</span><br>
                                        </li>
                                        <li value="3"><span>to terminate the tenancy for any other ground provided in the Act (e.g. landlord is seeking to live on the property again).</span><br>
                                        </li>
                                    </ol>
                                </li>
                                <li class="lh style-5ethY" id="style-5ethY"><strong><u><span>Address for Notice</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="30" id="style-7XyOQ" class="style-7XyOQ"><span>For any matter relating to this tenancy, the Tenant may be contacted at the Property or through the phone number below:</span><br>
                                    <ol start="1">
                                        <li value="1" id="style-HdkrD" class="style-HdkrD"><span>Name: {{ $buyer->name }}.</span><br>
                                        </li>
                                        <li value="2" id="style-Vg46N" class="style-Vg46N"><span>Phone: &nbsp;{{ $buyer->number }}.</span><br>
                                        </li>
                                    </ol>
                                </li>
                                <li value="31" id="style-qIGOp" class="style-qIGOp"><span>For any matter relating to this tenancy, whether during or after this tenancy has been terminated, the Landlord's address for notice is:</span><br>
                                    <ol start="1">
                                        <li value="1" id="style-dXHLZ" class="style-dXHLZ"><span>Name: {{ $property->landlord->name }}.</span><br>
                                        </li>
                                        <li value="2" id="style-UIHLR" class="style-UIHLR"><span>Address: {{ $property->landlord->location->area->name }}, {{ $property->landlord->location->city->name }}, UK.</span><br>
                                        </li>
                                    </ol>
                                    <p id="style-bzeJ7" class="style-bzeJ7">The contact information for the Landlord is: </p>
                                    <ol start="3">
                                        <li value="3" id="style-8Lo1E" class="style-8Lo1E"><span>Phone: &nbsp;{{ $property->landlord->phone }}.</span><br>
                                        </li>
                                    </ol>
                                </li>
                                <li value="32" id="style-Y5T64" class="style-Y5T64"><span>The Landlord or the Tenant may, on written notice to each other, change their respective addresses for notice under this Agreement.</span><br>
                                </li>
                                <li class="lh style-BTUL7" id="style-BTUL7"><strong><u><span>General Provisions</span></u></strong><strong><u><br></u></strong>
                                </li>
                                <li value="33" id="style-ARhBh" class="style-ARhBh"><span>Any waiver by the Landlord of any failure by the Tenant to perform or observe the provisions of this Agreement will not operate as a waiver of the Landlord's rights under this Agreement in respect of any subsequent defaults, breaches or non-performance by the Tenant of its obligations in this Agreement and will not defeat or affect in any way the Landlord's rights in respect of any subsequent default or breach.</span><br>
                                </li>
                                <li value="34" id="style-1482z" class="style-1482z"><span>This Agreement will extend to and be binding upon and inure to the benefit of the respective heirs, executors, administrators, successors and assignees, as the case may be, of each Party to this Agreement. All covenants are to be construed as conditions of this Agreement.</span><br>
                                </li>
                                <li value="35" id="style-eHDxv" class="style-eHDxv"><span>All sums payable by the Tenant to the Landlord pursuant to any provision of this Agreement will be deemed to be additional rent and will be recovered by the Landlord as rental arrears.</span><br>
                                </li>
                                <li value="36" id="style-MQwiZ" class="style-MQwiZ"><span>Where there is more than one Tenant executing this Agreement, all Tenants are jointly and severally liable for each other's acts, omissions and liabilities pursuant to this Agreement.</span><br>
                                </li>
                                <li value="37" id="style-jDSAE" class="style-jDSAE"><span>Locks may not be added or changed without the prior written agreement of both Parties, or unless the changes are made in compliance with the Act.</span><br>
                                </li>
                                <li value="38" id="style-AzgNY" class="style-AzgNY"><span>Headings are inserted for the convenience of the Parties only and are not to be considered when interpreting this Agreement. Words in the singular mean and include the plural and vice versa. Words in the masculine mean and include the feminine and vice versa.</span><br>
                                </li>
                                <li value="39" id="style-sqUbo" class="style-sqUbo"><span>This Agreement may be executed in counterparts. Facsimile signatures are binding and are considered to be original signatures.</span><br>
                                </li>
                                <li value="40" id="style-5Gwn4" class="style-5Gwn4"><span>Time is of the essence in this Agreement.</span><br>
                                </li>
                                <li value="41" id="style-qWOOM" class="style-qWOOM"><span>This Agreement will constitute the entire agreement between the Parties. </span><br>
                                </li>
                                <li value="42" id="style-jcJlR" class="style-jcJlR"><span>During the last 30 days of this Agreement, the Landlord or the Landlord's agents will have the privilege of displaying the usual 'For Sale' or 'To Let' or 'Vacancy' signs on the Property and the Tenant agrees to allow the Landlord or its agents reasonable access to the Property at reasonable times for the purpose of displaying such signs upon the Property.</span><br>
                                </li>
                            </ol>
                        </div>
                        <div class=" signature keepTogether">
                            <p id="style-2odJ8" class="style-2odJ8"><strong>IN WITNESS WHEREOF </strong>{{ $property->landlord->name }} and {{ $buyer->name }} have duly affixed their signatures on this {{ date('jS') }} day of {{ date('F') }}, {{ date('Y') }}. </p>
                            <table id="style-eh1FF" class="style-eh1FF">
                                <colgroup>
                                    <col id="style-GVMhK" class="style-GVMhK">
                                    <col id="style-jNgW7" class="style-jNgW7">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td id="style-P1ekL" class="style-P1ekL">
                                            <p id="style-cdMrY" class="style-cdMrY">
                                                <div class="file-container">
                                                    <label for="landlord_signature" class="file-label">Upload Landlord Signature</label>
                                                    <input type="file" name="landlord_signature" id="landlord_signature" class="file-input" required>
                                                    <img src="#" alt="Landlord Signature Preview" class="file-preview" id="landlordSignaturePreview">
                                                </div>
                                                <br> {{ $property->landlord->name }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="style-kgpcp" class="style-kgpcp">
                                <colgroup>
                                    <col id="style-VPriO" class="style-VPriO">
                                    <col id="style-doCZe" class="style-doCZe">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td id="style-nE4lK" class="style-nE4lK">
                                            <p id="style-iw8Q8" class="style-iw8Q8">
                                                <div class="file-container">
                                                    <label for="buyer_signature" class="file-label">Upload Buyer Signature</label>
                                                    <input type="file" name="buyer_signature" id="buyer_signature" class="file-input" required>
                                                    <img src="#" alt="Buyer Signature Preview" class="file-preview" id="buyerSignaturePreview">
                                                </div>


                                                <br> {{ $buyer->name }}  </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <center>
                        <button class="big-blue-button">Submit</button>

                    </center>
                    <div class=" header">
                        <span class="content">Tenancy Agreement</span>
                        <span class="pageNumbers">Page <span class="currentPageNum"></span> of <span class="totalPageNum"></span></span>
                    </div>
                    <div class=" footer"></div>
                    <span class="copyright">©2002-2024 move_right.co.uk®</span>
                </div>
                <div class="LDCopyright">
                    <p>©2002-2024 move_right.co.uk®</p>
                </div>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#landlord_signature').on('change', function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#landlordSignaturePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
            $('#buyer_signature').on('change', function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#buyerSignaturePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });

    </script>
@endsection
