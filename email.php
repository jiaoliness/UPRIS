/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::in controller:::::::::::::::::::::::::::::::::::::::::::::*/
public function register() {
// LOAD LIBRARIES
    $this->load->library(array('form_validation'));
    $this->form_validation->set_error_delimiters('<div class="error"><p>', '</p></div>');
// LOAD HELPERS
    $this->load->helper(array('form', 'url'));
// SET VALIDATION RULES
    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('reg_email_confirmation', 'Email', 'required');
    $this->form_validation->set_rules('reg_passwd', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<em>', '</em>');
    $data['user_a'] = $this->session->userdata('logged_in');
    $data['body'] = $this->load->view('user/register', '', true);
    if ($this->input->post('signup')) {
    
 $email = $this->input->post('email');
    $rand= random_string('unique');

 $this->user_model->save_user($rand);


 $this->load->library('email');
 $this->load->library('parser');
 //sending email to the user
 //loading template parser class
 //$this->load->library('parser');
 /*
 $params = array(
  'fname' => $this->input->post('firstname'),
  'lname' => $this->input->post('lastname'),
  'mail' => $this->input->post('email'),
  'pass' => $this->input->post('passwd'),
  'rand' => random_string('unique')
 );
 $this->parser->parse('templates/page', $params, TRUE);*/

 //$email=$this->input->post('email');
 //ECHO $email;
 //$rand=random_string('unique');
 //echo $rand;
 //End of parsing section
 //Sending Email

 $config['wordwrap'] = TRUE;
    $this->email->initialize($config);
 $this->email->from('SITENAME,SITEMAIL');
    $this->email->to($this->input->post('email'));
    $this->email->subject('Registration Verification: Continuous Imapression');
    $this->email->message('Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
Please click this link to activate your account:<a href='.site_url('user/verify').'?email='.$email.'&rand='.$rand.'>Click Here</a>'); 
    
 $this->email->send();
 $data['body'] = $this->load->view('user/register_over', NULL, true);
 
    }
 
    $data['header'] = $this->load->view('templates/header', $data, true);
  $data['footer'] = $this->load->view('templates/footer', '', true);
  $this->load->view('templates/page', $data);  
  }
 public function verify()
 {
 $this->user_model->update_user();
 $data['user_a'] = $this->session->userdata('logged_in');
 $data['body'] = $this->load->view('user/verify', NULL, true);
 $data['header'] = $this->load->view('templates/header', $data, true);
 $data['footer'] = $this->load->view('templates/footer', '', true);
 $this->load->view('templates/page', $data);  
 }



/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::in model:::::::::::::::::::::::::::::::::::::::::::::*/

class User_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }
  private function _prep_password($password) {
    return sha1($password . $this->config->item('encryption_key'));
  }
  public function save_user($rand) {
    $data = array(
      'fname' => $this->input->post('firstname'),
      'lname' => $this->input->post('lastname'),
      'mail' => $this->input->post('email'),
      'pass' => $this->_prep_password($this->input->post('passwd')),
   'rand' => $rand
    );
 return $this->db->insert('users', $data);

  }
  public function update_user()
  {
 $email = $this->input->get('email');
 $rand = $this->input->get('rand');
 $this->db->where('mail',$email);
 $this->db->where('rand',$rand);
 $data = array(
 'status' => 1,
 );
 return $this->db->update('users', $data);

  }