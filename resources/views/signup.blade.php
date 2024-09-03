@extends('layouts/layout2')

@section('content')

<form id="password-form" class="card card-md" action="{{ route('signup.store') }}" method="post" autocomplete="off" data-bitwarden-watching="1">
    @csrf
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Create new account</h2>

        @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                    </div>
                    <div>
                        Uh oh, something went wrong 
                    </div>
                </div>
                <div class="errors_heilight">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label name required">Name</label>
            <input type="text" 
                class="form-control" 
                placeholder="Enter name" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                minlength="2" 
                maxlength="50" 
                pattern="^[a-zA-Z]+(\s[a-zA-Z]+)*$" 
                title="Please enter a valid name. Only letters and spaces are allowed, with 2 to 50 characters.">

        </div>
        <div class="mb-3">
            <label class="form-label email required">Email address</label>
            <input type="email" 
                class="form-control" 
                placeholder="Enter email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                maxlength="100" 
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" 
                title="Please enter a valid email address.">

        </div>
        <div class="mb-3">
            <label class="form-label password required">Password</label>
            <div class="input-group input-group-flat">
            <input type="password" 
                class="form-control" 
                placeholder="Password" 
                autocomplete="off" 
                id="password" 
                name="password" 
                required 
                minlength="8" 
                maxlength="50" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Password must be at least 8 characters long, contain at least one number, one uppercase letter, and one lowercase letter.">

                <span class="input-group-text">
                    <a href="#" class="link-secondary" id="toggle-password" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-check">
                <input type="checkbox" class="form-check-input" name="agreed_to_terms" value="1" {{ old('agreed_to_terms') ? 'checked' : '' }} required>
                <span class="form-check-label">Agree the <a href="#" tabindex="-1" data-bs-toggle="modal" data-bs-target="#exampleModal">terms and policy</a>.</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Create new account</button>
        </div>
    </div>
</form>

<div class="text-center text-secondary mt-3">
    Already have account? <a href="{{ route('login.form'); }}" tabindex="-1">Sign in</a>
</div>

<!-- Modal Content -->  
<div class="modal terms-of-service" id="exampleModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms of Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-md">
                    <div class="card-body">
                        <div class="markdown">
                            <p>We (the folks at Tabler) run a website hosting platform called <a href="https://tabler.io">tabler.io</a> and would love for you to use it. Tabler.io’s basic service is free, and we offer paid upgrades for advanced features. Our service is designed to give you as much control and ownership over what goes on your website as possible. However, be responsible in what you publish. In particular, make sure that none of the prohibited items (like spam, viruses, or serious threats of violence) appear in your content.</p>
                            <hr>
                            <p>The following terms and conditions govern all use of the tabler.io website and all content, services, and products available at or through the website. Our Services are offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies (including, without limitation, <a href="https://tabler.io/privacy-policy.html">Tabler’s Privacy Policy</a> and procedures that may be published from time to time by Tabler (collectively, the “Agreement”). You agree that we may automatically upgrade our Services, and these terms will apply to any upgrades.</p>
                            <p>Please read this Agreement carefully before accessing or using our Services. By accessing or using any part of our services, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access or use any of our services. If these terms and conditions are considered an offer by Tabler, acceptance is expressly limited to these terms.</p>
                            <p>Our Services are not directed to users younger than 16, and access and use of our Services is only offered to users 16 years of age or older. If you are under 16 years old, please do not register to use our Services. Any person who registers as a user or provides their personal information to our Services represents that they are 16 years of age or older. Use of our Services requires a tabler.io account. You agree to provide us with complete and accurate information when you register for an account. You will be solely responsible and liable for any activity that occurs under your username. You are responsible for keeping your password secure.</p>
                            <h3 id="1-tablerio">1. tabler.io.</h3>
                            <ul>
                                <li>
                                    <p><strong>Responsibility of Contributors.</strong> If you post material to tabler.io, post links on tabler.io, or otherwise make (or allow any third party to make) material available (any such material, “Content”), you are entirely responsible for the content of, and any harm resulting from, that Content or your conduct. That is the case regardless of what form the Content takes, which includes, but is not limited to text, photo, video, audio, or code. By using tabler.io, you represent and warrant that your Content and conduct do not violate these terms. By submitting Content to Tabler for inclusion on your account, you grant Tabler a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content solely for the purpose of displaying, distributing, and promoting your changelog. If you delete Content, Tabler will use reasonable efforts to remove it from tabler.io, but you acknowledge that caching or references to the Content may not be made immediately unavailable. Without limiting any of those representations or warranties, Tabler has the right (though not the obligation) to, in Tabler’s sole discretion, (i) reclaim your username or website’s URL due to prolonged inactivity, (ii) refuse or remove any content that, in Tabler’s reasonable opinion, violates any tabler policy or is in any way harmful or objectionable, or (iii) terminate or deny access to and use of Tabler.io to any individual or entity for any reason. Tabler will have no obligation to provide a refund of any amounts previously paid.</p>
                                </li>
                                <li>
                                    <p><strong>HTTPS.</strong> We offer free HTTPS on all tabler.io accounts by default.</p>
                                </li>
                            </ul>
                            <h3 id="2-responsibility-of-visitors">2. Responsibility of Visitors.</h3>
                            <p>Tabler has not reviewed, and cannot review, all of the material, including computer software, posted to our Services, and cannot therefore be responsible for that material’s content, use or effects. By operating our Services, Tabler does not represent or imply that it endorses the material there posted, or that it believes such material to be accurate, useful, or non-harmful. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. Our Services may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. Our Services may also contain material that violates the privacy or publicity rights, or infringes the intellectual property and other proprietary rights, of third parties, or the downloading, copying or use of which is subject to additional terms and conditions, stated or unstated. Tabler disclaims any responsibility for any harm resulting from the use by visitors of our Services, or from any downloading by those visitors of content there posted.</p>
                            <h3 id="3-content-posted-on-other-websites">3. Content Posted on Other Websites.</h3>
                            <p>We have not reviewed, and cannot review, all of the material, including computer software, made available through the websites and webpages to which Tabler links, and that link to Tabler. Tabler does not have any control over those non-tabler websites, and is not responsible for their contents or their use. By linking to a non-tabler website, Tabler does not represent or imply that it endorses such website. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. Tabler disclaims any responsibility for any harm resulting from your use of non-tabler websites and webpages.</p>
                            <h3 id="5-copyright-infringement-and-dmca-policy">5. Copyright Infringement and DMCA Policy.</h3>
                            <p>As Tabler asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by tabler.io violates your copyright, you are encouraged to notify Tabler in accordance with Tabler’s Digital Millennium Copyright Act (“DMCA”) Policy. Tabler will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. Tabler will terminate a visitor’s access to and use of the Website if, under appropriate circumstances, the visitor is determined to be a repeat infringer of the copyrights or other intellectual property rights of Tabler or others. In the case of such termination, Tabler will have no obligation to provide a refund of any amounts previously paid to Tabler.</p>
                            <h3 id="6-intellectual-property">6. Intellectual Property.</h3>
                            <p>This Agreement does not transfer from Tabler to you any Tabler or third party intellectual property, and all right, title, and interest in and to such property will remain (as between the parties) solely with Tabler. Tabler, tabler.io, the tabler.io logo, and all other trademarks, service marks, graphics and logos used in connection with tabler.io or our Services, are trademarks or registered trademarks of Tabler or Tabler’s licensors. Other trademarks, service marks, graphics and logos used in connection with our Services may be the trademarks of other third parties. Your use of our Services grants you no right or license to reproduce or otherwise use any Tabler or third-party trademarks.</p>
                            <h3 id="7-changes">7. Changes.</h3>
                            <p>We are constantly updating our Services, and that means sometimes we have to change the legal terms under which our Services are offered. If we make changes that are material, we will let you know by posting on our changelog, or by sending you an email or other communication before the changes take effect. The notice will designate a reasonable period of time after which the new terms will take effect.</p>
                            <h3 id="8-disclaimer-of-warranties">8. Disclaimer of Warranties.</h3>
                            <p>Our Services are provided “as is.” Tabler and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither Tabler nor its suppliers and licensors, makes any warranty that our Services will be error free or that access thereto will be continuous or uninterrupted.</p>
                            <h3 id="9-license">9. License.</h3>
                            <p>By using Tabler, You are acknowledging that You have read and have agreed to <a href="https://tabler.io/license.html">Tabler’s License</a>, so please read them carefully.</p>
                            <h3 id="10-general-representation-and-warranty">10. General Representation and Warranty.</h3>
                            <p>You represent and warrant that (i) your use of our Services will be in strict accordance with the Tabler Privacy Policy, with this Agreement, and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of our Services will not infringe or misappropriate the intellectual property rights of any third party.</p>
                            <h3 id="12-refund-policy">12. Refund Policy.</h3>
                            <p>Payments for Tabler are not refundable for any reason.</p>
                            <h3 id="13-translation">13. Translation.</h3>
                            <p>These Terms of Service were originally written in English (US). We may translate these terms into other languages. In the event of a conflict between a translated version of these Terms of Service and the English version, the English version will control.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection