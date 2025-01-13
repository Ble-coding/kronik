     <!-- prettier-ignore -->
     <?php
// Charger les traductions pour la section "program"
$lang = $_SESSION['lang'] ?? 'en'; // Langue définie via session ou autre méthode
$program_translations = include __DIR__ . "/../../languages/{$lang}/program/program.php";
?>
     <section class="box-section overflow-hidden section-service-detail">
       <div class="container" data-aos="fade-up">
         <div class="row">
           <div class="col-lg-3">
             <div class="block-menu-left mb-30">
             <div class="sidebar-brochure">
               <h4 class="sub-heading-ag-xl title-line-bottom"><?= htmlspecialchars($program_translations['brochure_section']['title']) ?></h4>
               <p class="paragraph-rubik-m"><?= htmlspecialchars($program_translations['brochure_section']['description']) ?></p>
               <div class="link-download">
               <a href="documents/document.pdf" download="MonDocumentPDF">
                   <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M16.0938 18.375V5.90625L10.1875 0H2.96875C2.27256 0 1.60488 0.276562 1.11259 0.768845C0.620312 1.26113 0.34375 1.92881 0.34375 2.625V18.375C0.34375 19.0712 0.620312 19.7389 1.11259 20.2312C1.60488 20.7234 2.27256 21 2.96875 21H13.4688C14.1649 21 14.8326 20.7234 15.3249 20.2312C15.8172 19.7389 16.0938 19.0712 16.0938 18.375ZM10.1875 3.9375C10.1875 4.45964 10.3949 4.9604 10.7641 5.32962C11.1333 5.69883 11.6341 5.90625 12.1562 5.90625H14.7812V18.375C14.7812 18.7231 14.643 19.0569 14.3968 19.3031C14.1507 19.5492 13.8168 19.6875 13.4688 19.6875H2.96875C2.62065 19.6875 2.28681 19.5492 2.04067 19.3031C1.79453 19.0569 1.65625 18.7231 1.65625 18.375V2.625C1.65625 2.2769 1.79453 1.94306 2.04067 1.69692C2.28681 1.45078 2.62065 1.3125 2.96875 1.3125H10.1875V3.9375Z" fill="#246cb4" />
                     <path d="M3.76019 18.4892C3.50437 18.3869 3.29827 18.1892 3.18531 17.9379C2.92937 17.4287 3.01469 16.9194 3.29031 16.4916C3.55019 16.0886 3.98069 15.7461 4.46763 15.4586C5.08442 15.1088 5.7364 14.825 6.41275 14.6121C6.938 13.6678 7.40354 12.6916 7.80662 11.6891C7.56562 11.1415 7.37666 10.5724 7.24225 9.98944C7.12937 9.46444 7.08606 8.94469 7.18188 8.49844C7.28031 8.03381 7.5415 7.61644 8.035 7.41825C8.287 7.31719 8.56 7.26075 8.82512 7.31719C8.95849 7.34558 9.08386 7.4033 9.19215 7.48616C9.30044 7.56902 9.38892 7.67494 9.45119 7.79625C9.56669 8.0115 9.60869 8.2635 9.61788 8.50238C9.62706 8.74913 9.60213 9.02213 9.55619 9.30825C9.44594 9.97763 9.20181 10.7966 8.87369 11.6629C9.23579 12.4373 9.66625 13.1778 10.1599 13.8757C10.7441 13.8296 11.3317 13.8516 11.9108 13.9414C12.3886 14.028 12.8742 14.1973 13.1708 14.5517C13.3283 14.7407 13.4241 14.9717 13.4333 15.2316C13.4425 15.4836 13.3716 15.7329 13.2522 15.9705C13.1487 16.1906 12.9883 16.3791 12.7876 16.5165C12.5891 16.6459 12.3548 16.7093 12.1182 16.6976C11.6837 16.6792 11.2598 16.4404 10.8936 16.1503C10.4483 15.7821 10.0471 15.3637 9.69794 14.9034C8.81036 15.0042 7.93332 15.1825 7.07688 15.4363C6.68467 16.1319 6.23697 16.7947 5.73813 17.4182C5.35488 17.8776 4.93881 18.2792 4.52144 18.4511C4.28163 18.5596 4.00962 18.5732 3.76019 18.4892ZM5.57012 15.9941C5.35225 16.0939 5.15012 16.1989 4.96769 16.3065C4.53719 16.5611 4.25762 16.8092 4.1185 17.0244C3.99512 17.2148 3.9925 17.3526 4.066 17.4982C4.07912 17.5271 4.09225 17.5455 4.10012 17.556C4.11578 17.5518 4.13113 17.5466 4.14606 17.5403C4.32587 17.4668 4.612 17.2318 4.9795 16.7895C5.18851 16.5336 5.38559 16.2682 5.57012 15.9941ZM7.72263 14.2485C8.1609 14.1462 8.60314 14.0617 9.04825 13.9952C8.80927 13.6295 8.58594 13.2538 8.37887 12.8691C8.17301 13.3345 7.95418 13.794 7.72263 14.2472V14.2485ZM10.933 14.8391C11.1299 15.0531 11.3215 15.2329 11.5039 15.3772C11.8189 15.6266 12.0381 15.7093 12.1576 15.7133C12.1895 15.7174 12.222 15.7105 12.2494 15.6936C12.304 15.6504 12.3465 15.5939 12.3728 15.5295C12.4195 15.4496 12.446 15.3595 12.4502 15.267C12.4495 15.2362 12.4373 15.2067 12.4161 15.1843C12.3479 15.1029 12.1536 14.9848 11.7363 14.91C11.4708 14.8656 11.2022 14.8423 10.933 14.8404V14.8391ZM8.32113 10.2375C8.43159 9.88118 8.51926 9.5182 8.58362 9.15075C8.62431 8.904 8.64006 8.70056 8.6335 8.54044C8.63386 8.45209 8.61967 8.36429 8.5915 8.28056C8.52584 8.28869 8.46173 8.30638 8.40119 8.33306C8.287 8.379 8.19381 8.47219 8.14394 8.7045C8.09144 8.9565 8.10456 9.32006 8.20431 9.78337C8.23581 9.92906 8.27519 10.0813 8.32244 10.2375H8.32113Z" fill="#246cb4" />
                   </svg> <?= htmlspecialchars($program_translations['brochure_section']['links']['pdf']) ?> </a>
                <a href="documents/document.doc" download="MonDocumentDOC">
                   <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 3.71429V17.2792V3.71429Z" fill="#B91202" />
                     <path d="M17 7.78571V17.2857V7.78571Z" fill="#B91202" />
                     <path d="M3.66666 1H10.3333H3.66666Z" fill="#B91202" />
                     <path d="M3.66666 20H14.3333H3.66666Z" fill="#B91202" />
                     <path d="M17 17.2857C17.0073 18.6413 15.6666 20 14.3333 20L17 17.2857Z" fill="#B91202" />
                     <path d="M1 17.2857C1 18.6429 2.33333 20 3.66666 20L1 17.2857Z" fill="#B91202" />
                     <path d="M1 3.71232C1 2.35714 2.33333 1.03022 3.66666 1L1 3.71232Z" fill="#B91202" />
                     <path d="M16.9927 7.7918L10.3333 1L16.9927 7.7918Z" fill="#B91202" />
                     <path d="M10.3333 5.07143C10.3374 6.42119 11.672 7.78571 13 7.78571L10.3333 5.07143Z" fill="#B91202" />
                     <path d="M10.3333 5.07143V1V5.07143Z" fill="#B91202" />
                     <path d="M13 7.78571H17H13Z" fill="#B91202" />
                     <path d="M3.66666 17.2857H7.66665H3.66666Z" fill="#B91202" />
                     <path d="M3.66666 14.5714H10.3333H3.66666Z" fill="#B91202" />
                     <path d="M3.66666 11.8571H7.66665H3.66666Z" fill="#B91202" />
                     <path d="M1.5 3.71429C1.5 3.43814 1.27614 3.21429 1 3.21429C0.723858 3.21429 0.5 3.43814 0.5 3.71429H1.5ZM0.5 17.2792C0.5 17.5554 0.723858 17.7792 1 17.7792C1.27614 17.7792 1.5 17.5554 1.5 17.2792H0.5ZM17 7.78571H17.5C17.5 7.50957 17.2761 7.28571 17 7.28571V7.78571ZM17 17.2857H16.5L16.5 17.2884L17 17.2857ZM3.66666 1V0.499872L3.65533 0.500128L3.66666 1ZM10.3333 1L10.6903 0.649944C10.5963 0.554039 10.4676 0.5 10.3333 0.5V1ZM1.5 17.2857C1.5 17.0096 1.27614 16.7857 1 16.7857C0.723858 16.7857 0.5 17.0096 0.5 17.2857H1.5ZM0.5 3.71232C0.5 3.98846 0.723858 4.21232 1 4.21232C1.27614 4.21232 1.5 3.98846 1.5 3.71232H0.5ZM16.6357 8.14186C16.829 8.33903 17.1456 8.34215 17.3427 8.14882C17.5399 7.95549 17.543 7.63892 17.3497 7.44175L16.6357 8.14186ZM10.3333 5.07143H9.83331L9.83332 5.07295L10.3333 5.07143ZM13 7.78571V8.28571V7.78571ZM3.66666 16.7857C3.39052 16.7857 3.16666 17.0096 3.16666 17.2857C3.16666 17.5619 3.39052 17.7857 3.66666 17.7857V16.7857ZM7.66665 17.7857C7.9428 17.7857 8.16665 17.5619 8.16665 17.2857C8.16665 17.0096 7.9428 16.7857 7.66665 16.7857V17.7857ZM3.66666 14.0714C3.39052 14.0714 3.16666 14.2953 3.16666 14.5714C3.16666 14.8476 3.39052 15.0714 3.66666 15.0714V14.0714ZM10.3333 15.0714C10.6095 15.0714 10.8333 14.8476 10.8333 14.5714C10.8333 14.2953 10.6095 14.0714 10.3333 14.0714V15.0714ZM3.66666 11.3571C3.39052 11.3571 3.16666 11.581 3.16666 11.8571C3.16666 12.1333 3.39052 12.3571 3.66666 12.3571V11.3571ZM7.66665 12.3571C7.9428 12.3571 8.16665 12.1333 8.16665 11.8571C8.16665 11.581 7.9428 11.3571 7.66665 11.3571V12.3571ZM0.5 3.71429V17.2792H1.5V3.71429H0.5ZM16.5 7.78571V17.2857H17.5V7.78571H16.5ZM3.66666 1.5H10.3333V0.5H3.66666V1.5ZM3.66666 20.5H14.3333V19.5H3.66666V20.5ZM16.5 17.2884C16.5028 17.8046 16.2441 18.3623 15.813 18.8005C15.3813 19.2393 14.8344 19.5 14.3333 19.5V20.5C15.1656 20.5 15.9556 20.0814 16.5258 19.5019C17.0964 18.9219 17.5045 18.1224 17.5 17.283L16.5 17.2884ZM0.5 17.2857C0.5 18.1238 0.906869 18.9222 1.47666 19.5022C2.04591 20.0816 2.83423 20.5 3.66666 20.5V19.5C3.16577 19.5 2.62075 19.2398 2.19 18.8014C1.7598 18.3635 1.5 17.8048 1.5 17.2857H0.5ZM1.5 3.71232C1.5 3.19572 1.7585 2.64546 2.18861 2.21113C2.61902 1.77649 3.16853 1.51142 3.67799 1.49987L3.65533 0.500128C2.83147 0.518804 2.04764 0.932309 1.47806 1.50748C0.908169 2.08296 0.5 2.87374 0.5 3.71232H1.5ZM17.3497 7.44175L10.6903 0.649944L9.9763 1.35006L16.6357 8.14186L17.3497 7.44175ZM9.83332 5.07295C9.83585 5.90721 10.2443 6.70487 10.8133 7.28487C11.3817 7.8643 12.1689 8.28571 13 8.28571V7.28571C12.5031 7.28571 11.959 7.02487 11.5271 6.58459C11.0958 6.14489 10.8349 5.58541 10.8333 5.06991L9.83332 5.07295ZM10.8333 5.07143V1H9.83332V5.07143H10.8333ZM13 8.28571H17V7.28571H13V8.28571ZM3.66666 17.7857H7.66665V16.7857H3.66666V17.7857ZM3.66666 15.0714H10.3333V14.0714H3.66666V15.0714ZM3.66666 12.3571H7.66665V11.3571H3.66666V12.3571Z" fill="#246cb4" />
                   </svg>  <?= htmlspecialchars($program_translations['brochure_section']['links']['doc']) ?>  </a>
               </div>
             </div>
               <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                 <li class="nav-item" role="presentation">
                   <a class="nav-link active" id="pills-acceleration-tab" data-bs-toggle="pill" href="#pills-acceleration" role="tab" aria-controls="pills-acceleration" aria-selected="true">
                   <span><?= htmlspecialchars($program_translations['categories']['acceleration_incubation']) ?></span>
                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
                 <li class="nav-item" role="presentation">
                   <a class="nav-link" id="pills-projet-tab" data-bs-toggle="pill" href="#pills-projet" role="tab" aria-controls="pills-projet" aria-selected="false">
                   <span><?= htmlspecialchars($program_translations['categories']['pilot_projects']) ?></span>
                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
                 <li class="nav-item" role="presentation">
                   <a class="nav-link" id="pills-formation-tab" data-bs-toggle="pill" href="#pills-formation" role="tab" aria-controls="pills-formation" aria-selected="false">
                   <span><?= htmlspecialchars($program_translations['categories']['training_resources']) ?></span>
                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
               </ul>
             </div>
             <!-- <div class="sidebar-brochure">
               <h4 class="sub-heading-ag-xl title-line-bottom">Get a Free Quote</h4>
               <div class="form-quote mt-4">
                 <form class="form" action="#">
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="Your Name" />
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="E-mail Address" />
                   </div>
                   <div class="form-group">
                     <textarea class="form-control" rows="4" placeholder="Type Your Message"></textarea>
                   </div>
                   <div class="form-group">
                     <button type="submit" class="btn btn-primary-home-rounded w-100">Send Message</button>
                   </div>
                 </form>
               </div>
             </div> -->
           </div>
           <div class="col-lg-9">
             <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active service-detail" id="pills-acceleration" role="tabpanel" aria-labelledby="pills-acceleration-tab">
                 <!-- <div class="service-detail"><h1 class="heading-ag-3xl mb-20">Acceleration et Incubations</h1><p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis.</p><p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate tortor egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim. Id nulla amet tincidunt urna sed massa sed. Pellentesque imperdiet proin aliquam nisl nulla. In donec massa ultrices amet eget. Tristique sed purus et maecenas condimentu purus lectus diam diam tellus libero id sapien justo.</p><p>Lorem ipsum dolor sit amet consectetur. Ut tellus suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis. Augue eu vulputate egestas cursus vivamus. Commodo dictum iaculis eget massa phasellus ultrices nunc dignissim.</p><h3>Plan Benefits</h3><div class="row"><div class="col-md-6"><ul><li>Global Data Analysis</li><li>Zero broker commission</li><li>Analytics and Engineering</li><li>IT Services & Cybersecurity</li><li>Data and Cloud Computing</li></ul></div><div class="col-md-6"><ul><li>Guaranteed by the services</li><li>Workspace cloud business</li><li>Managed backup services</li><li>Experts & News from the Industry.</li><li>A well established expertise</li></ul></div></div></div> -->
                 <div class="box-questions">
                   <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
                   <h4 class="heading-ag-lg dark-950 mb-30"><?= htmlspecialchars($program_translations['categories']['acceleration_incubation']) ?></h4>
                   <div>
                     <img src="/assets/imgs/pages/services/baner_4.jpg" alt="Kronik" />
                   </div>
                   <div class="block-faqs">
                   <div class="accordion" id="accordionFAQ">
    <!-- Incubation -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingIncubation">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIncubation" aria-expanded="false" aria-controls="collapseIncubation">
                <p><?= htmlspecialchars($program_translations['sections']['incubation']['title']) ?></p>
            </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseIncubation" aria-labelledby="headingIncubation" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <h6 class="mb-3"><?= htmlspecialchars($program_translations['sections']['incubation']['subtitle']) ?></h6>
                <h4><?= htmlspecialchars($program_translations['sections']['main_objective']) ?></h4>
                <p class="p-classik"><?= htmlspecialchars($program_translations['sections']['incubation']['main_objective']) ?></p>
                <h4><?= htmlspecialchars($program_translations['sections']['target_audience']) ?></h4>
                <ul>
                    <?php foreach ($program_translations['sections']['incubation']['target_audience'] as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4><?= htmlspecialchars($program_translations['sections']['program_content']) ?></h4>
                <ol>
                    <?php foreach ($program_translations['sections']['incubation']['program_content'] as $content): ?>
                        <li><?= htmlspecialchars($content['module']) ?>
                            <?php if (!empty($content['submodules'])): ?>
                                <ul>
                                    <?php foreach ($content['submodules'] as $submodule): ?>
                                        <li><?= htmlspecialchars($submodule) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <h4><?= htmlspecialchars($program_translations['sections']['duration']) ?></h4>
                <p class="p-classik"><?= htmlspecialchars($program_translations['sections']['incubation']['duration']) ?></p>
            </div>
        </div>
    </div>

    <!-- Accélération -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingAcceleration">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAcceleration" aria-expanded="false" aria-controls="collapseAcceleration">
                <p><?= htmlspecialchars($program_translations['sections']['acceleration']['title']) ?></p>
            </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseAcceleration" aria-labelledby="headingAcceleration" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <h6 class="mb-3"><?= htmlspecialchars($program_translations['sections']['acceleration']['subtitle']) ?></h6>
                <h4><?= htmlspecialchars($program_translations['sections']['main_objective']) ?></h4>
                <p class="p-classik"><?= htmlspecialchars($program_translations['sections']['acceleration']['main_objective']) ?></p>
                <h4><?= htmlspecialchars($program_translations['sections']['target_audience']) ?></h4>
                <ul>
                    <?php foreach ($program_translations['sections']['acceleration']['target_audience'] as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <h4><?= htmlspecialchars($program_translations['sections']['program_content']) ?></h4>
                <ol>
                    <?php foreach ($program_translations['sections']['acceleration']['program_content'] as $content): ?>
                        <li><?= htmlspecialchars($content['module']) ?>
                            <?php if (!empty($content['submodules'])): ?>
                                <ul>
                                    <?php foreach ($content['submodules'] as $submodule): ?>
                                        <li><?= htmlspecialchars($submodule) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <h4><?= htmlspecialchars($program_translations['sections']['duration']) ?></h4>
                <p class="p-classik"><?= htmlspecialchars($program_translations['sections']['acceleration']['duration']) ?></p>
            </div>
        </div>
    </div>
</div>
                   </div>
                 </div>
               </div>
               <div class="tab-pane fade show service-detail" id="pills-projet" role="tabpanel" aria-labelledby="pills-projet-tab">
     <div class="box-questions">
       <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
       <h4 class="heading-ag-lg dark-950 mb-30">  <?= htmlspecialchars($program_translations['title_projet']) ?></h4>
       
       <div>
         <img src="/assets/imgs/pages/services/baner_2.jpg" alt="Kronik" />
       </div>
       <div class="service-detail">
        <p class="p-classik">
            <?= $program_translations['paragraph_1'] ?>
        </p>
        <p class="p-classik">
            <?= $program_translations['paragraph_2'] ?>
        </p>
        <h3><?= htmlspecialchars($program_translations['benefits_title']) ?></h3>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php foreach ($program_translations['benefits_column_1'] as $benefit): ?>
                        <li><?= htmlspecialchars($benefit) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <?php foreach ($program_translations['benefits_column_2'] as $benefit): ?>
                        <li><?= htmlspecialchars($benefit) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
     </div>
   </div>
               <div class="tab-pane fade show service-detail" id="pills-formation" role="tabpanel" aria-labelledby="pills-formation-tab">
               <div class="box-questions">
                   <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
                   <h4 class="heading-ag-lg dark-950 mb-30"> <?= htmlspecialchars($program_translations['titleResource']) ?></h4>
                  
                   <div>
                     <img src="/assets/imgs/pages/services/baner3.jpg" alt="Kronik" />
                   </div>
                   <div class="service-detail">
                   <p class="p-classik">
            <?= $program_translations['paragraph_1'] ?>
        </p>
        <p class="p-classik">
            <?= $program_translations['paragraph_2'] ?>
        </p> 
</div>
</div>
          
                 </div>
     </div>
             </div>
           </div>
         </div>
     </section>

   
     <?php
                require __DIR__ . '/form.php';
            ?>