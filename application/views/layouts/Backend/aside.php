        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU NAVEGACIÓN</li>
                    <li>
                        <a href="<?php echo base_url(); ?>">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>

                    <!-- =============================================== -->
                   
                        <?php 
                        if(!empty($menu)):
                            
                        ?>
                            <?php foreach ($menu as $men): ?>
                            <li class="treeview">
                          <a href="<?php echo base_url();echo $men->controller ?>">
                           <i class="fa fa-cogs"></i> <span><?php echo $men->titulo ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                                </a>


                                
                                <ul class="treeview-menu">
                                <?php foreach ($submenu as $submen): 

                                    if($men->id_menu==$submen->padre): ?>
                                         
                                        <?php 
                                         $tieneSubhija=false;
                                         foreach ($submenu as $submen2):
                                            if($submen->id_menu==$submen2->padre):
                                                $tieneSubhija=true;
                                            endif;

                                         endforeach;

                                         if($tieneSubhija){
                                            ?>
                                                 <li class="treeview">
                                                    <a href="<?php echo base_url(); ?>">
                                                        <i class="fa fa-cogs"></i> <span><?php echo $submen->titulo ?></span>
                                                        <span class="pull-right-container">
                                                            <i class="fa fa-angle-left pull-right"></i>
                                                        </span>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                    <?php 
                                                $tieneSubhija=false;
                                                foreach ($submenu as $submen2):
                                                    if($submen->id_menu==$submen2->padre):
                                                        ?>
                                                        <li><a href="<?php echo base_url();echo $submen2->controller ?>"><i class="fa fa-circle-o"></i><?php echo $submen2->titulo?></a></li>   
                           
                                                        <?php
                                                    endif;

                                                      endforeach;

                                         
                                            ?>
                                                 
                                                       </ul>


                                                       </li>

                                            <?php
                                         }else{?>
                                            <li><a href="<?php echo base_url();echo $submen->controller ?>"><i class="fa fa-circle-o"></i><?php echo $submen->titulo ?></a></li>
                                            <?php
                                         }
                                        
                                        
                                        endif ?>
      
                                     <?php  endforeach; ?>
                                     </ul>
                                    
                              

                               
                               
                          </li>
                                  <?php  endforeach; ?>
    
                        <?php  endif;
                        
                        
                        
                        ?>
                  

                     <!-- =============================================== -->
                     
                     
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!--


                  <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Productos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Generar Boleta</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Generar Factura</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Productos</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Ventas</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Tipo Documentos</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                        </ul>
                    </li>
        -->