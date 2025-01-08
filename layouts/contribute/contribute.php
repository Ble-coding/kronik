<?php
// Définir le chemin de la racine du projet
$base_path = dirname(__DIR__, 2); // Remonte de deux niveaux pour atteindre la racine
$lang = $lang ?? 'en'; // Définit une langue par défaut si $lang n'est pas défini

// Charger les traductions spécifiques à la page "contribute"
$contribute_translations = include "{$base_path}/languages/{$lang}/contribute/contribute.php";
$service_detail = $contribute_translations['service_detail'];
?>
   <!-- prettier-ignore -->
     <section class="box-section overflow-hidden section-service-detail">
       <div class="container" data-aos="fade-up">
         <div class="row">
           <div class="col-lg-3"> 
             <div class="block-menu-left mb-30">
               <div class="sidebar-brochure">
                 <h4 class="sub-heading-ag-xl title-line-bottom"><?= htmlspecialchars($contribute_translations['brochures']['title']) ?></h4>
                 <p class="paragraph-rubik-m"><?= htmlspecialchars($contribute_translations['brochures']['description']) ?></p>
                 <div class="link-download">
                   <a href="documents/document.pdf" download="MonDocumentPDF">
                     <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M16.0938 18.375V5.90625L10.1875 0H2.96875C2.27256 0 1.60488 0.276562 1.11259 0.768845C0.620312 1.26113 0.34375 1.92881 0.34375 2.625V18.375C0.34375 19.0712 0.620312 19.7389 1.11259 20.2312C1.60488 20.7234 2.27256 21 2.96875 21H13.4688C14.1649 21 14.8326 20.7234 15.3249 20.2312C15.8172 19.7389 16.0938 19.0712 16.0938 18.375ZM10.1875 3.9375C10.1875 4.45964 10.3949 4.9604 10.7641 5.32962C11.1333 5.69883 11.6341 5.90625 12.1562 5.90625H14.7812V18.375C14.7812 18.7231 14.643 19.0569 14.3968 19.3031C14.1507 19.5492 13.8168 19.6875 13.4688 19.6875H2.96875C2.62065 19.6875 2.28681 19.5492 2.04067 19.3031C1.79453 19.0569 1.65625 18.7231 1.65625 18.375V2.625C1.65625 2.2769 1.79453 1.94306 2.04067 1.69692C2.28681 1.45078 2.62065 1.3125 2.96875 1.3125H10.1875V3.9375Z" fill="#246cb4" />
                       <path d="M3.76019 18.4892C3.50437 18.3869 3.29827 18.1892 3.18531 17.9379C2.92937 17.4287 3.01469 16.9194 3.29031 16.4916C3.55019 16.0886 3.98069 15.7461 4.46763 15.4586C5.08442 15.1088 5.7364 14.825 6.41275 14.6121C6.938 13.6678 7.40354 12.6916 7.80662 11.6891C7.56562 11.1415 7.37666 10.5724 7.24225 9.98944C7.12937 9.46444 7.08606 8.94469 7.18188 8.49844C7.28031 8.03381 7.5415 7.61644 8.035 7.41825C8.287 7.31719 8.56 7.26075 8.82512 7.31719C8.95849 7.34558 9.08386 7.4033 9.19215 7.48616C9.30044 7.56902 9.38892 7.67494 9.45119 7.79625C9.56669 8.0115 9.60869 8.2635 9.61788 8.50238C9.62706 8.74913 9.60213 9.02213 9.55619 9.30825C9.44594 9.97763 9.20181 10.7966 8.87369 11.6629C9.23579 12.4373 9.66625 13.1778 10.1599 13.8757C10.7441 13.8296 11.3317 13.8516 11.9108 13.9414C12.3886 14.028 12.8742 14.1973 13.1708 14.5517C13.3283 14.7407 13.4241 14.9717 13.4333 15.2316C13.4425 15.4836 13.3716 15.7329 13.2522 15.9705C13.1487 16.1906 12.9883 16.3791 12.7876 16.5165C12.5891 16.6459 12.3548 16.7093 12.1182 16.6976C11.6837 16.6792 11.2598 16.4404 10.8936 16.1503C10.4483 15.7821 10.0471 15.3637 9.69794 14.9034C8.81036 15.0042 7.93332 15.1825 7.07688 15.4363C6.68467 16.1319 6.23697 16.7947 5.73813 17.4182C5.35488 17.8776 4.93881 18.2792 4.52144 18.4511C4.28163 18.5596 4.00962 18.5732 3.76019 18.4892ZM5.57012 15.9941C5.35225 16.0939 5.15012 16.1989 4.96769 16.3065C4.53719 16.5611 4.25762 16.8092 4.1185 17.0244C3.99512 17.2148 3.9925 17.3526 4.066 17.4982C4.07912 17.5271 4.09225 17.5455 4.10012 17.556C4.11578 17.5518 4.13113 17.5466 4.14606 17.5403C4.32587 17.4668 4.612 17.2318 4.9795 16.7895C5.18851 16.5336 5.38559 16.2682 5.57012 15.9941ZM7.72263 14.2485C8.1609 14.1462 8.60314 14.0617 9.04825 13.9952C8.80927 13.6295 8.58594 13.2538 8.37887 12.8691C8.17301 13.3345 7.95418 13.794 7.72263 14.2472V14.2485ZM10.933 14.8391C11.1299 15.0531 11.3215 15.2329 11.5039 15.3772C11.8189 15.6266 12.0381 15.7093 12.1576 15.7133C12.1895 15.7174 12.222 15.7105 12.2494 15.6936C12.304 15.6504 12.3465 15.5939 12.3728 15.5295C12.4195 15.4496 12.446 15.3595 12.4502 15.267C12.4495 15.2362 12.4373 15.2067 12.4161 15.1843C12.3479 15.1029 12.1536 14.9848 11.7363 14.91C11.4708 14.8656 11.2022 14.8423 10.933 14.8404V14.8391ZM8.32113 10.2375C8.43159 9.88118 8.51926 9.5182 8.58362 9.15075C8.62431 8.904 8.64006 8.70056 8.6335 8.54044C8.63386 8.45209 8.61967 8.36429 8.5915 8.28056C8.52584 8.28869 8.46173 8.30638 8.40119 8.33306C8.287 8.379 8.19381 8.47219 8.14394 8.7045C8.09144 8.9565 8.10456 9.32006 8.20431 9.78337C8.23581 9.92906 8.27519 10.0813 8.32244 10.2375H8.32113Z" fill="#246cb4" />
                     </svg>   <?= htmlspecialchars($contribute_translations['brochures']['pdf']) ?> </a>
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
                     </svg>   <?= htmlspecialchars($contribute_translations['brochures']['doc']) ?> </a>
                 </div>
               </div>
               <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                 <li class="nav-item" role="presentation">
                   <a class="nav-link active" id="pills-mentorat-tab" data-bs-toggle="pill" href="#pills-mentorat" role="tab" aria-controls="pills-mentorat" aria-selected="true">
                   <span><?= htmlspecialchars($contribute_translations['sections']['become_mentor']) ?></span>

                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
                 <li class="nav-item" role="presentation">
                   <a class="nav-link" id="pills-coach-tab" data-bs-toggle="pill" href="#pills-coach" role="tab" aria-controls="pills-coach" aria-selected="false">
                   <span><?= htmlspecialchars($contribute_translations['sections']['become_coach']) ?></span>
                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
                 <li class="nav-item" role="presentation">
                   <a class="nav-link" id="pills-partner-tab" data-bs-toggle="pill" href="#pills-partner" role="tab" aria-controls="pills-partner" aria-selected="false">
                   <span><?= htmlspecialchars($contribute_translations['sections']['become_partner']) ?></span>

                     <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M20.2742 6.67971H0.724078C0.323572 6.67971 0 6.37442 0 5.99653C0 5.61864 0.323572 5.31335 0.724078 5.31335H18.5251L14.1308 1.16728C13.848 0.900413 13.848 0.467019 14.1308 0.200151C14.4137 -0.0667171 14.873 -0.0667171 15.1558 0.200151L20.7878 5.51403C20.996 5.71045 21.0571 6.00293 20.9439 6.25913C20.8308 6.51319 20.5661 6.67971 20.2742 6.67971Z" fill="" />
                       <path d="M14.6354 12C14.4499 12 14.2643 11.9338 14.124 11.7993C13.8412 11.5324 13.8412 11.0991 14.124 10.8322L19.7628 5.5119C20.0456 5.24503 20.505 5.24503 20.7878 5.5119C21.0706 5.77877 21.0706 6.21216 20.7878 6.47903L15.1491 11.7993C15.0065 11.9338 14.821 12 14.6354 12Z" fill="" />
                     </svg>
                   </a>
                 </li>
               </ul>
             </div>
           </div>
           <div class="col-lg-9">
             <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active service-detail" id="pills-mentorat" role="tabpanel" aria-labelledby="pills-mentorat-tab">
                 <div class="box-questions">
                   <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
                   <h4 class="heading-ag-lg dark-950 mb-30"><?= htmlspecialchars($contribute_translations['mentor_title']) ?></h4>
                   <div>
                     <img src="assets/imgs/pages/services/mentorat_web.jpg" alt="Kronik" />
                   </div>
                   <div class="service-detail">
        <p class="p-classik"><?= $service_detail['intro'] ?></p>
        <p class="p-classik"><?= $service_detail['importance'] ?></p>
        <h3><?= htmlspecialchars($service_detail['advantages_title']) ?></h3>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php foreach ($service_detail['advantages']['left'] as $advantage): ?>
                        <li><?= htmlspecialchars($advantage) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <?php foreach ($service_detail['advantages']['right'] as $advantage): ?>
                        <li><?= htmlspecialchars($advantage) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
                   <div class="block-faqs">
                     <div class="accordion" id="accordionFAQ">
                       <div id="accordionFAQ" class="accordion">
                         <!-- Pourquoi devenir mentor ? -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingWhyMentor">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWhyMentor" aria-expanded="true" aria-controls="collapseWhyMentor">                 <?= htmlspecialchars($contribute_translations['accordion']['why_mentor']) ?>
                             </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseWhyMentor" aria-labelledby="headingWhyMentor" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                             <ul>
                    <?php foreach ($contribute_translations['why_mentor_list'] as $item): ?>
                        <li>
                            <strong><?= htmlspecialchars($item['title']) ?></strong>
                            <?= htmlspecialchars($item['description']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Profil des mentors recherchés -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingMentorProfile">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMentorProfile" aria-expanded="true" aria-controls="collapseMentorProfile"> <?= htmlspecialchars($contribute_translations['accordion']['mentor_profile']) ?></button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseMentorProfile" aria-labelledby="headingMentorProfile" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                             <ul>
                    <?php foreach ($contribute_translations['mentor_profile_list'] as $item): ?>
                        <li>
                            <strong><?= htmlspecialchars($item['title']) ?></strong>
                            <?= htmlspecialchars($item['description']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Rôles et responsabilités des mentors -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingRoles">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoles">  <?= htmlspecialchars($contribute_translations['accordion']['mentor_roles']) ?> </button>
                           </h5>
                           <div class="accordion-collapse collapse " id="collapseRoles" aria-labelledby="headingRoles" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                               <?php foreach ($contribute_translations['mentor_roles_list'] as $item): ?>
                        <li>
                            <?= htmlspecialchars($item['description']) ?>
                        </li>
                    <?php endforeach; ?>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Engagement demandé -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingCommitment">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommitment" aria-expanded="true" aria-controls="collapseCommitment"> <?= htmlspecialchars($contribute_translations['accordion']['mentor_commitment']) ?></button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseCommitment" aria-labelledby="headingCommitment" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                               <?php foreach ($contribute_translations['mentor_commitment_list'] as $item): ?>
                        <li>
                            <strong><?= htmlspecialchars($item['title']) ?></strong>
                            <?= htmlspecialchars($item['description']) ?>
                        </li>
                    <?php endforeach; ?>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Avantages pour les mentors -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingBenefits">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBenefits" aria-expanded="true" aria-controls="collapseBenefits">   <?= htmlspecialchars($contribute_translations['accordion']['mentor_benefits']) ?></button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseBenefits" aria-labelledby="headingBenefits" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                               <?php foreach ($contribute_translations['mentor_benefits_list'] as $item): ?>
                    <li>
                        <strong><?= htmlspecialchars($item['title']) ?></strong>
                        <?= htmlspecialchars($item['description']) ?>
                    </li>
                <?php endforeach; ?>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Comment devenir mentor ? -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingBecomeMentor">
                          
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBecomeMentor" aria-expanded="true" aria-controls="collapseBecomeMentor">   <?= htmlspecialchars($contribute_translations['accordion']['become_mentor']) ?></button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseBecomeMentor" aria-labelledby="headingBecomeMentor" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <h6 class="mb-3"><?= htmlspecialchars($contribute_translations['accordion']['become_mentor']) ?></h6>
                               <ol>
                               <?php foreach ($contribute_translations['become_mentor_steps'] as $step): ?>
                    <li>
                        <strong><?= htmlspecialchars($step['title']) ?></strong>
                        <?= htmlspecialchars($step['description']) ?>
                    </li>
                <?php endforeach; ?>

                               </ol>
                             </div>
                           </div>
                         </div>
                         <!-- Contact pour plus d'informations -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingContactInfo">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactInfo" aria-expanded="true" aria-controls="collapseContactInfo"><?= htmlspecialchars($contribute_translations['accordion']['contact_info']) ?> </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseContactInfo" aria-labelledby="headingContactInfo" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <p><?= htmlspecialchars($contribute_translations['contact_info']['description']) ?></p>
                               <ul>
                <li>
                    <strong><?= htmlspecialchars($contribute_translations['contact_info']['details']['email']['label']) ?></strong>
                    <a href="mailto:<?= htmlspecialchars($contribute_translations['contact_info']['details']['email']['value']) ?>">
                        <?= htmlspecialchars($contribute_translations['contact_info']['details']['email']['value']) ?>
                    </a>
                </li>
                <li>
                    <strong><?= htmlspecialchars($contribute_translations['contact_info']['details']['phone']['label']) ?></strong>
                    <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $contribute_translations['contact_info']['details']['phone']['value'])) ?>">
                        <?= htmlspecialchars($contribute_translations['contact_info']['details']['phone']['value']) ?>
                    </a>
                </li>
            </ul>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div> <?php
                  require __DIR__ . '/mentorForm.php';
                  ?>
                 </div>
               </div>
               <div class="tab-pane fade show  service-detail" id="pills-coach" role="tabpanel" aria-labelledby="pills-coach-tab">
                 <div class="box-questions">
                   <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
                   <h4 class="heading-ag-lg dark-950 mb-30">Devenir Coach au Kronik X Health</h4>
                   <div>
                     <img src="assets/imgs/pages/services/coach_web.jpg" alt="Kronik" />
                   </div>
                   <div class="service-detail">
                     <p class="p-classik"> Accompagnez les innovateurs dans leur parcours pour transformer la prise en charge des maladies chroniques grâce à des solutions numériques. En intégrant l'équipe des mentors du <strong>Kronik X Health</strong>, vous jouez un rôle déterminant dans la transformation d'idées novatrices en outils concrets et impactants pour les patients et les professionnels de santé. </p>
                     <p class="p-classik"> En tant que mentor, vous guidez les startups sur des sujets essentiels tels que l’optimisation technologique, la stratégie de mise sur le marché et la conformité réglementaire en santé numérique. Vous contribuez directement à l’ <strong>amélioration des parcours de santé</strong> en garantissant que chaque solution est adaptée aux besoins réels des utilisateurs et à leur contexte local. Collaborer avec les hôpitaux partenaires permet également de tester et d’affiner les innovations en conditions réelles pour un impact maximal. </p>
                     <h3>Principaux Avantages d’Être Coach au Kronik X Health</h3>
                     <div class="row">
                       <div class="col-md-6">
                         <ul>
                           <li>Encadrement de startups pour développer des solutions adaptées aux réalités locales.</li>
                           <li>Contribution à des projets ayant un impact direct sur les systèmes de santé en LMICs.</li>
                           <li>Participation à des tests en milieu réel pour valider l’efficacité des innovations.</li>
                           <li>Transfert de connaissances en stratégie, business model et technologies émergentes.</li>
                           <li>Soutien dans l’adoption d’outils numériques pour améliorer l’accès aux soins.</li>
                         </ul>
                       </div>
                       <div class="col-md-6">
                         <ul>
                           <li>Impact positif sur les parcours de soins pour les patients atteints de maladies chroniques.</li>
                           <li>Collaboration avec des professionnels de santé pour ajuster les solutions.</li>
                           <li>Optimisation de l’utilisation des ressources disponibles dans les environnements sous-équipés.</li>
                           <li>Renforcement des relations entre startups, patients et professionnels de santé.</li>
                           <li>Participation à des initiatives qui révolutionnent la prise en charge des maladies chroniques.</li>
                         </ul>
                       </div>
                     </div>
                   </div>
                   <div class="block-faqs">
                     <div class="accordion" id="accordionFAQ">
                       <div id="accordionFAQ" class="accordion">
                         <!-- Pourquoi devenir coach ? -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingWhyCoach">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWhyCoach" aria-expanded="true" aria-controls="collapseWhyCoach"> Pourquoi devenir coach ? </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseWhyCoach" aria-labelledby="headingWhyCoach" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                                 <li>
                                   <strong>Soutenez l’innovation locale :</strong> Aidez les startups à concrétiser leurs idées et à relever les défis de la santé en Afrique.
                                 </li>
                                 <li>
                                   <strong>Apportez un impact tangible :</strong> Contribuez à l’amélioration des parcours de soins pour des millions de patients.
                                 </li>
                                 <li>
                                   <strong>Développez vos compétences :</strong> Interagissez avec des équipes dynamiques et découvrez de nouvelles perspectives.
                                 </li>
                                 <li>
                                   <strong>Faites partie d’un écosystème :</strong> Rejoignez une communauté d’experts, d’entrepreneurs et de partenaires stratégiques.
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Profil des coaches recherchés -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingCoachProfile">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCoachProfile" aria-expanded="true" aria-controls="collapseCoachProfile"> Profil des coaches recherchés </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseCoachProfile" aria-labelledby="headingCoachProfile" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                                 <li>
                                   <strong>Santé et médecine :</strong> Expertise en oncologie, maladies chroniques (diabète, hypertension, etc.), gestion des soins.
                                 </li>
                                 <li>
                                   <strong>Technologies numériques :</strong> Connaissances en intelligence artificielle, Big Data, objets connectés.
                                 </li>
                                 <li>
                                   <strong>Gestion d’entreprise :</strong> Stratégie, marketing, finance, ou développement commercial.
                                 </li>
                                 <li>
                                   <strong>Compétences personnelles :</strong> Leadership, communication, gestion d’équipe.
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Rôles et responsabilités des coaches -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingRoles">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoles"> Rôles et responsabilités des coaches </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseRoles" aria-labelledby="headingRoles" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                                 <li>Accompagner les équipes dans les stratégies de développement, commercialisation et mise à l’échelle.</li>
                                 <li>Former les équipes sur la gestion de projet, la communication, et les relations avec les parties prenantes.</li>
                                 <li>Suivre les progrès des startups et aider à établir des objectifs clairs.</li>
                                 <li>Motiver les équipes et fournir un soutien moral et professionnel.</li>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Engagement demandé -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingCommitment">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommitment" aria-expanded="true" aria-controls="collapseCommitment"> Engagement demandé </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseCommitment" aria-labelledby="headingCommitment" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                                 <li>
                                   <strong>Durée :</strong> Engagement flexible, généralement de 3 à 6 mois.
                                 </li>
                                 <li>
                                   <strong>Fréquence :</strong> Sessions hebdomadaires ou bimensuelles, en ligne ou en présentiel.
                                 </li>
                                 <li>
                                   <strong>Interactions :</strong> Participation à des ateliers, réunions stratégiques et feedbacks réguliers.
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Avantages pour les coaches -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingBenefits">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBenefits" aria-expanded="true" aria-controls="collapseBenefits"> Avantages pour les coaches </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseBenefits" aria-labelledby="headingBenefits" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ul>
                                 <li>
                                   <strong>Reconnaissance :</strong> Votre contribution sera mise en valeur dans les communications officielles.
                                 </li>
                                 <li>
                                   <strong>Réseautage :</strong> Accédez à une communauté internationale d’entrepreneurs et d’experts.
                                 </li>
                                 <li>
                                   <strong>Développement professionnel :</strong> Développez vos compétences en mentorat tout en contribuant à un projet d’impact social.
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>
                         <!-- Comment devenir coach ? -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingBecomeCoach">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBecomeCoach" aria-expanded="true" aria-controls="collapseBecomeCoach"> Comment devenir coach ? </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseBecomeCoach" aria-labelledby="headingBecomeCoach" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <ol>
                                 <li>
                                   <strong>Remplir le formulaire :</strong> Accédez au formulaire de candidature en ligne.
                                 </li>
                                 <li>
                                   <strong>Entretien :</strong> Un entretien sera organisé pour évaluer vos compétences.
                                 </li>
                                 <li>
                                   <strong>Intégration :</strong> Une fois sélectionné(e), vous recevrez un guide pour commencer votre mission.
                                 </li>
                               </ol>
                             </div>
                           </div>
                         </div>
                         <!-- Contact pour plus d'informations -->
                         <div class="accordion-item wow fadeInUp">
                           <h5 class="accordion-header" id="headingContactInfo">
                             <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactInfo" aria-expanded="true" aria-controls="collapseContactInfo"> Contact pour plus d’informations </button>
                           </h5>
                           <div class="accordion-collapse collapse" id="collapseContactInfo" aria-labelledby="headingContactInfo" data-bs-parent="#accordionFAQ">
                             <div class="accordion-body">
                               <p>Pour toute question ou demande d’information, contactez notre équipe :</p>
                               <ul>
                                 <li>
                                   <strong>Email :</strong>
                                   <a href="mailto:coaches@kroniklab.ci">coaches@kroniklab.ci</a>
                                 </li>
                                 <li>
                                   <strong>Téléphone :</strong>
                                   <a href="tel:+2250123456789">+225 01 23 45 67 89</a>
                                 </li>
                               </ul>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div> <?php
                  require __DIR__ . '/coachForm.php';
                  ?>
                 </div>
               </div>
               <div class="tab-pane fade show  service-detail" id="pills-partner" role="tabpanel" aria-labelledby="pills-partner-tab">
                 <div class="box-questions">
                   <!-- <h1 class="heading-ag-3xl mb-20"></h1> -->
                   <h4 class="heading-ag-lg dark-950 mb-30">Devenir Mentor au Kronik X Health</h4>
                   <div>
                     <img src="assets/imgs/pages/services/partner_web.jpg" alt="Kronik" />
                   </div>
                   <div class="service-detail">
    <p class="p-classik">
        Rejoignez-nous pour faire partie d'une initiative qui révolutionne la prise en charge des maladies chroniques en Afrique de l’Ouest. 
        En collaborant avec le <strong>Kronik X Health</strong>, vous participez activement à l’amélioration des parcours de soins grâce à des solutions numériques et des technologies avancées. 
        Nous invitons les mentors, partenaires, et coachs à jouer un rôle clé dans cette transformation, en accompagnant les innovateurs et en contribuant à développer des outils qui répondent aux besoins des patients et des professionnels de santé.
    </p>
    <p class="p-classik">
        Associez-vous à cette mission pour relever les défis complexes des maladies chroniques dans les LMICs (Low and Middle-Income Countries). 
        Vous travaillerez aux côtés d'experts en santé numérique, de startups innovantes et d’institutions médicales pour co-créer des solutions adaptées aux réalités locales. 
        Chaque contribution compte dans la construction d’un écosystème qui met l’innovation au service des populations les plus vulnérables.
    </p>
    <h3>Principaux Avantages de Rejoindre Kronik X Health</h3>
    <div class="row">
        <div class="col-md-6">
            <ul>
                <li>Participation active à la transformation des systèmes de santé en Afrique de l’Ouest.</li>
                <li>Collaboration avec des startups pour concevoir des solutions adaptées aux contextes locaux.</li>
                <li>Accès à un réseau d'experts en santé numérique et innovation.</li>
                <li>Contribution à des projets ayant un impact direct sur les parcours de soins des patients.</li>
                <li>Opportunité de co-créer des outils technologiques pour améliorer l'accès aux soins.</li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul>
                <li>Impact significatif sur la prise en charge des maladies chroniques.</li>
                <li>Renforcement des capacités des innovateurs à travers mentorat et coaching.</li>
                <li>Partenariat avec des institutions médicales pour tester et affiner les innovations.</li>
                <li>Développement de solutions numériques en collaboration avec les professionnels de santé.</li>
                <li>Participation à des initiatives révolutionnaires pour répondre aux besoins des LMICs.</li>
            </ul>
        </div>
    </div>
</div>

                   <div class="block-faqs">
                     <div class="accordion" id="accordionFAQ">
                     <div id="accordionFAQ" class="accordion">
    <!-- Pourquoi devenir partenaire ? -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingWhyPartner">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWhyPartner" aria-expanded="true" aria-controls="collapseWhyPartner"> Pourquoi devenir partenaire ? </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseWhyPartner" aria-labelledby="headingWhyPartner" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <ul>
                    <li><strong>Contribuez à un impact social :</strong> Soutenez des projets qui améliorent la qualité de vie des patients atteints de maladies chroniques et graves.</li>
                    <li><strong>Stimulez l’innovation locale :</strong> Investissez dans des solutions numériques adaptées aux besoins spécifiques de l’Afrique de l’Ouest.</li>
                    <li><strong>Rejoignez un réseau stratégique :</strong> Collaborez avec des experts en santé numérique, des startups prometteuses, et des institutions influentes.</li>
                    <li><strong>Renforcez votre visibilité :</strong> Positionnez votre marque comme un acteur clé dans l’innovation en santé.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Types de partenariats disponibles -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingPartnershipTypes">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePartnershipTypes" aria-expanded="true" aria-controls="collapsePartnershipTypes"> Types de partenariats disponibles </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapsePartnershipTypes" aria-labelledby="headingPartnershipTypes" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <ul>
                    <li><strong>Partenariats financiers :</strong> Soutenez le Kronik X Health par des subventions ou des investissements pour accélérer nos programmes et soutenir les startups incubées.</li>
                    <li><strong>Partenariats technologiques :</strong> Fournissez des outils, des logiciels ou des infrastructures technologiques pour appuyer le développement des solutions incubées.</li>
                    <li><strong>Partenariats académiques et de recherche :</strong> Travaillez sur des études cliniques, des projets de recherche en santé numérique et des validations scientifiques.</li>
                    <li><strong>Partenariats stratégiques :</strong> Aidez à établir des connexions avec des investisseurs, des bailleurs de fonds et des décideurs publics.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Engagement des partenaires -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingPartnerCommitment">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePartnerCommitment" aria-expanded="true" aria-controls="collapsePartnerCommitment"> Engagement des partenaires </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapsePartnerCommitment" aria-labelledby="headingPartnerCommitment" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <ul>
                    <li><strong>Flexibilité :</strong> Les partenariats sont adaptés aux objectifs et capacités de chaque organisation.</li>
                    <li><strong>Durée :</strong> Engagements ponctuels ou sur le long terme.</li>
                    <li><strong>Implication :</strong> Participation active à des événements, mentorat des startups, ou financement de projets spécifiques.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Avantages pour les partenaires -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingPartnerBenefits">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePartnerBenefits" aria-expanded="true" aria-controls="collapsePartnerBenefits"> Avantages pour les partenaires </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapsePartnerBenefits" aria-labelledby="headingPartnerBenefits" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <ul>
                    <li><strong>Visibilité renforcée :</strong> Votre logo et votre marque présents dans nos événements, supports de communication et publications officielles.</li>
                    <li><strong>Réseautage stratégique :</strong> Accès exclusif à notre réseau de startups, experts en santé numérique, et partenaires internationaux.</li>
                    <li><strong>Impact mesurable :</strong> Suivi et reporting des résultats obtenus grâce à votre partenariat.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Comment devenir partenaire ? -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingBecomePartner">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBecomePartner" aria-expanded="true" aria-controls="collapseBecomePartner"> Comment devenir partenaire ? </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseBecomePartner" aria-labelledby="headingBecomePartner" data-bs-parent="#accordionFAQ">
            <div class="accordion-body">
                <ol>
                    <li><strong>Contactez-nous :</strong> Remplissez le formulaire ou envoyez un email à notre équipe.</li>
                    <li><strong>Définissez vos objectifs :</strong> Discutons ensemble de vos priorités et de la manière dont nous pouvons collaborer.</li>
                    <li><strong>Formalisez le partenariat :</strong> Signature d’un accord précisant les engagements des deux parties.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Contact pour plus d'informations -->
<div class="accordion-item wow fadeInUp">
    <h5 class="accordion-header" id="headingContactInfo">
        <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactInfo" aria-expanded="true" aria-controls="collapseContactInfo">
            Contact pour plus d’informations
        </button>
    </h5>
    <div class="accordion-collapse collapse" id="collapseContactInfo" aria-labelledby="headingContactInfo" data-bs-parent="#accordionFAQ">
        <div class="accordion-body">
            <p>Pour toute question ou demande d’information, contactez notre équipe :</p>
            <ul>
                <li>
                    <strong>Email :</strong>
                    <a href="mailto:partenaires@kronikxhealth.ci">partenaires@kronikxhealth.ci</a>
                </li>
             
     <li><strong>Téléphone :</strong> <a href="tel:+2250123456789">+225 01 23 45 67 89</a></li>
                    <strong>Adresse :</strong>
                    Abidjan, Côte d’Ivoire
                </li>
            </ul>
        </div>
    </div>
</div>

</div>

                     </div>
                   </div> <?php
                  require __DIR__ . '/partnerForm.php';
                  ?>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>