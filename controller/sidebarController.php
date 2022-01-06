<?php
    class sidebarController
    {
        public function __construct()
        {
            
        }

        public function afficherListesPrivees()
        {
            if($_GET['action']!='Invite'){
                echo '<p>Private</p>';
               $listgw = new ListeGateway();
               $liste = $listgw->getList();
               foreach ($liste as $value) {
                 echo "<li>
                 <a href='?action=pageListe&amp;list=".$value['idList']."'>
                  <i class='bx bx-list-ul'></i>
                  <p class='links_name'>".$value['nomList']."</p>
                 </a>
                 <p class='tooltip'>".$value['nomList']."</p>
                 </li>";
                }
            }
        }
        public function afficherListesPubliques()
        {
            echo '<p>Public</p>';
            $listgw = new ListeGateway();
            $liste = $listgw->getListInvite();
            foreach ($liste as $value) {
                echo "<li>
                <a href='?action=pageListe'>
                <i class='bx bx-list-ul'></i>
                <p class='links_name'>".$value['nomList']."</p>
                </a>
                <p class='tooltip'>".$value['nomList']."</p>
            </li>";
            }
        }
    }
?>