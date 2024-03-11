<style>
    #custom-search-input{
        padding: 3px;
        border: solid 1px #E4E4E4;
        border-radius: 6px;
        background-color: #fff;
    }

    #custom-search-input input{
        border: 0;
        box-shadow: none;
    }

    #custom-search-input button{
        margin: 2px 0 0 0;
        background: none;
        box-shadow: none;
        border: 0;
        color: #666666;
        padding: 0 8px 0 10px;
        border-left: solid 1px #ccc;
    }

    #custom-search-input button:hover{
        border: 0;
        box-shadow: none;
        border-left: solid 1px #ccc;
    }

    #custom-search-input .glyphicon-search{
        font-size: 23px;
    }
</style>
<div class="container">
    <div class="row">
        <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'tra_cuu', 'khao_thi' => true))) ?>
        <div class="col-md-6 col-md-offset-3">
            <h3>Nhập họ và tên giảng viên:</h3>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <?php
                    $value = "";

                    if ($this->Session->check("khao_thi_search_term")) {
                        $value = $this->Session->read("khao_thi_search_term");
                    }

                    echo $this->Form->input('username', array('label' => false, 
                        "value" => $value, "class" => "form-control input-lg", 'div' => false, "placeholder" => "Họ và tên GV",
                        'after' => '<span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>'
                    ));
                    ?>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-md-offset-3">
            
            <div id="datarows">

            </div>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>
