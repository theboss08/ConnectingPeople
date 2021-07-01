import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

export default class ChatBox extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      user_id_1 : this.props.user_id_1,
      user_id_2 : this.props.user_id_2,
      messages : [],
      message : "",
    }
  }

  getMessages = async () => {
    let res = await axios.get(`/chat/messages/${this.state.user_id_2}`);
    this.setState({messages : res.data}, () => {
      document.querySelector('#message_box').scrollTo(0, document.querySelector('#message_box').scrollHeight);
    });
  }

  async componentDidMount(){
    console.log(this.props.user_id_1);
    console.log(this.props.user_id_2);
    this.getMessages();
    window.Echo.private("chat").listen('.message.new', e => {
      this.getMessages();
    })
  }

  handleSubmit = async event => {
    event.preventDefault();
    this.setState({message : ""});
    let res = await axios.post(`/chat/message/${this.state.user_id_2}`, {
      message : this.state.message,
    });
    let res2 = await axios.get(`/chat/messages/${this.state.user_id_2}`);
    this.setState({messages : res2.data}, () => {
      document.querySelector('#message_box').scrollTo(0, document.querySelector('#message_box').scrollHeight);
    });
    if(res.data.status !== 'success') alert('Some error occurred');
  }

  handleChange = async event => {
    this.setState({message : event.target.value});
  }

  render(){
    return(
      <div>
      <div className="messages" id="message_box" style={{height : "500px", overflowY : "scroll", overflowX : "hidden"}}>
      {this.state.messages.map((message, key) => (
        <div className="mt-5" key={key}>
          <b>{message.sent_by}</b> : {message.message}
        </div>
      ))}
      </div>
      <form onSubmit={this.handleSubmit} style={{marginTop : "20px"}}>
      <TextField style={{width : "91%"}} id="outlined-basic" label="Message" value={this.state.message} onChange={this.handleChange} variant="outlined" required={true} />
      <Button style={{marginLeft : "10px", padding : "15px 18px"}} variant="contained" color="primary" type="submit">
        Send
      </Button>
      </form>
      </div>
    );
  }
}

if (document.getElementById('chat_box')) {
    const propsContainer = document.getElementById('chat_box');
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(<ChatBox {...props} />, document.getElementById('chat_box'));
}