 $(document).ready(function(){
                                $('#email').blur(function(){
                                    var error_email = '';
                                    var email = $('#email').val();
                                    var _token = $('input[name="_token"]').val();
                                    var filter=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                    if (!filter.test(email)) {
                                        $('#error').addClass('has-error');
                                        $('#error_email').html('<label class="text-danger">Невірний Email</label>');
                                        $('#register').attr('disabled', 'disabled');
                                    }else{
                                        $.ajax({
                                            url:'register/'+email,
                                            method: 'POST',
                                            data:{email:email, _token:_token} ,
                                            success:function(result){
                                                if (result == 'unique') {
                                                    $('#error_email').html('<label class="text-success">Email вільний!</label>');
                                                    $('#email').removeClass('has-error');
                                                    $('#register').attr('disabled', false);
                                                } else{
                                                    $('#error_email').html('<label class="text-danger">Email зайнятий!</label>');
                                                    $('#email').addClass('has-error');
                                                    $('#register').attr('disabled', 'disabled');
                                                }
                                            }
                                        })
                                    }
                                });
                            });