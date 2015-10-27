<br />
<div class="col-md-2"></div>
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="header_styles" style="padding:15px">
            List of Quizes
        </div>
        <div class="panel-body">
            <div class="col-md-12" style="padding:0px">
            <?php echo $this->session->flashdata('message') ?>
                <form class="form-horizontal" method="post" action="/insert_question">
                        <input type="hidden" value="<?php echo $examid ?>" name="examid">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Question</label>
                            <div class="col-sm-8">
                               <textarea class="form-control" style="resize:none" name="quest" placeholder="Insert Question Here...." required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Choices</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="c1" placeholder="Choices Here." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" name="c2" placeholder="Choices Here." required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" name="c3" placeholder="Choices Here." required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Answer</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" name="answer" placeholder="Answer Here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Points</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" name="points" placeholder="Points" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                            </div>
                        </div>
                </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="header_styles">
                    <th>Question</th>
                    <th>Answer</th>
                    <th width="20%">Action</th>
                </thead>
                <tbody>
                    <?php foreach ($this->facultymd->get_all_question($examid) as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['question'] ?></td>
                            <td><?php echo $value['answer'] ?></td>
                            <td><a href="/delete_questions/<?php echo $value['id'] . '/' . $examid ?>" class="btn btn-danger btn-xs "  onclick="return confirm('Are You Sure?')">Delete
                                    <span class="fa fa-trash-o"></span>
                                </a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
