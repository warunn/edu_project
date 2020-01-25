<?php //new edit ?>
<div id="main_area">
    <div class="post" style="height: 500px">
        <h1 align="center">Admin Main Control Panel</h1>
        <table>
            <tr>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting" style="text-align:left">
                            <div align="center"><a href="<?php echo URL; ?>reg"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/new.gif" width="70"> </a>
                            </div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>reg">Register New Student </a></div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left"><a href="<?php echo URL; ?>search"></a>
                        <div id="setting"><a href="<?php echo URL; ?>search">
                                <div align="center"><img src="<?php echo URL; ?>views/dashboard/includes/comment.gif"
                                                         width="70"/></div>
                            </a></div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>article/scomment"> Find Student</a></div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting">
                            <div align="center"><a href="<?php echo URL; ?>reg/findst"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/delete.gif" width="70"
                                            align="middle"></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>reg/findst"> Edit Student Details</a></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 200px;float:left;">
                        <div id="setting">
                            <div align="center"><a href="<?php echo URL; ?>reg/newparent"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/delete.gif" width="70"
                                            align="middle"></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>reg/newparent"> Add New Parent</a></div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting">
                            <div align="center"><a href="<?php echo URL; ?>miscase/find"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/miscase.gif" width="70"
                                            align="middle"></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>miscase/find"> Find Misbehavior Case</a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>miscase"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/miscase.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>miscase"> New Misbehavior Case</a></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>teacher"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>teacher"> Register New Teacher</a></div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>teacher/find"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>teacher/find"> Find Teacher</a></div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="width: 200px;float:left;">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>subject"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/delete.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>subject"> Create Subject</a></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="float: left">
                        <div style="width: 200px;float:left">
                            <div id="setting2">
                                <div align="center"><a href="<?php echo URL; ?>user"><img
                                                src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt=""
                                                width="70" align="middle"/></a></div>
                            </div>

                            <div>
                                <div align="center"><a href="<?php echo URL; ?>user"> Create Admin User</a></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>

                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>user/editdel"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>user/editdel"> Edit Admin User</a></div>
                        </div>
                    </div>


                </td>
                <td>
                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>studentclass"><img src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt="" width="70" align="middle" /></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>studentclass">Create New Class</a></div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>

                    <div style="width: 200px;float:left">
                        <div id="setting2">
                            <div align="center"><a href="<?php echo URL; ?>location/index"><img
                                            src="<?php echo URL; ?>views/dashboard/includes/teacher.gif" alt=""
                                            width="70" align="middle"/></a></div>
                        </div>
                        <div>
                            <div align="center"><a href="<?php echo URL; ?>user/editdel">Student Location</a></div>
                        </div>
                    </div>


                </td>
                
            </tr>
        </table>

    </div>
</div>
