<div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
                <form method="post" action="myAddAgentExe.php" class="mb-3" enctype="multipart/form-data" id="agency">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">機構名稱 <span>*</span></label>
                            <input type="text" class="form-control" name = "name" id="name" required>
                        </div>
                        <div class="col">
                            <label for="main_image" class="form-label">機構封面圖片 <span>*</span></label>
                            <input type="file" class="form-control" name="main_image" id="main_image" accept=".png, .jpg, .jpeg" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone" class="form-label">聯絡電話 <span>*</span></label>
                                <input type="tel" class="form-control" name = "phone" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">機構地址 <span>*</span></label>
                                <input type="text" class="form-control" name = "address" id="address" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">類型 <span>*</span></label>
                                    <?php
                                                                                                                                    //類型
                                        $care_type = ['日照型','day','住宿型','stay','養護型','curing'];
                                        for($i=0; $i<count($care_type); $i+=2){                                            //count() 讀取大小
                                            $Ch = $care_type[$i];
                                            $En = $care_type[$i+1];
                                            echo '<div class="form-check">';
                                            echo    '<input class="form-check-input" type="checkbox" name="care_typeInput[]" value="'.$En.'" id="'.$En.'">';
                                            echo    '<label class="form-check-label" for="'.$En.'">';
                                            echo        $Ch;
                                            echo    '</label>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                                <div class="col">
                                    <label class="form-label">長照對象 <span>*</span></label>
                                    <?php
                                                                                                                                    //長照對象
                                        $admission_type = ['一般人','normal','精神障礙','unnormal'];
                                        for($i=0; $i<count($admission_type); $i+=2){                                            //count() 讀取大小
                                            $Ch = $admission_type[$i];
                                            $En = $admission_type[$i+1];
                                            echo '<div class="form-check">';
                                            echo    '<input class="form-check-input" type="checkbox" name="admission_typeInput[]" value="'.$En.'" id="'.$En.'">';
                                            echo    '<label class="form-check-label" for="'.$En.'">';
                                            echo        $Ch;
                                            echo    '</label>';
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php
                                                                                                                                    //年齡
                                    $age = ['最小收治年齡','start','最大收治年齡','end'];
                                    for($i=0; $i<count($age); $i+=2){                                            //count() 讀取大小
                                        $Ch = $age[$i];
                                        $En = $age[$i+1];
                                        echo '<div class="col">';
                                        echo    '<label for="'.$En.'" class="form-label">'.$Ch.' <span>*</span></label>';
                                        echo    '<input type="number" class="form-control" name = "'.$En.'" id="'.$En.'" required>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="people" class="form-label">核准收容人數 <span>*</span></label>
                                <input type="number" class="form-control" name = "people" id="people" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">合作縣市政府 <span>*</span></label>
                                <br>
                                <?php
                                    include './layout/gov.php';
                                                                                                                                    //政府
                                    for($i=0; $i<count($gov); $i+=2){                                            //count() 讀取大小
                                        $Ch = $gov[$i];
                                        $En = $gov[$i+1];
                                        echo '<div class="form-check form-check-inline">';
                                        echo    '<input class="form-check-input" type="checkbox" name="govInput[]" value="'.$En.'" id="gov'.$En.'">';
                                        echo    '<label class="form-check-label" for="gov'.$En.'">';
                                        echo        $Ch;
                                        echo    '</label>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <?php
                                                                                                                            //收費
                                for($i=0;$i<count($admission_type);$i+=2){
                                    $Ch = $admission_type[$i];
                                    $En = $admission_type[$i+1];

                                    echo '<div class="mb-3" id="cost'.$En.'" style="display:none;">';
                                    echo    '<label class="form-label">'.$Ch.'收費<span> *</span></label>';
                                    echo    '<div class="row mb-3">';
                                    echo        '<div class="col">';
                                    echo            '<input type="number" class="form-control" name = "h_'.$En.'" placeholder="每小時收費">';
                                    echo        '</div>';
                                    echo        '<div class="col">';
                                    echo            '<input type="number" class="form-control" name = "m_'.$En.'" placeholder="每月收費">';
                                    echo        '</div>';
                                    echo    '</div>';
                                    echo '</div>';
                                }                                
                            ?>
                            <div class="mb-3">
                                <label for="image_src" class="form-label">機構圖片 <span>*</span></label>
                                <input type="file" class="form-control" name="image_src[]" id="image_src" accept=".png, .jpg, .jpeg" multiple required>
                            </div>
                            <div class="mb-3">
                                <label for="detailed" class="form-label">詳細描述</label>
                                <textarea class="form-control" name = "detailed" id="detailed" rows="3"></textarea>
                            </div>
                        </div>
                    </div><!--end of row-->

                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </form>
            </div>
        </div>
    </div>