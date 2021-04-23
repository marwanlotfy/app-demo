import React from 'react'
import { withRouter } from 'react-router';

class Login extends React.Component{
    constructor(props){
        super(props);
        this.state={
            email:'',
            password:'',
        }
    }
    componentDidMount(){
        if (this.props.authManager.check()) {
            this.props.history.push('/');
        }
    }

    login(){
        const cred = {
            email:this.state.email,
            password:this.state.password
        };

        this.props.authManager.authunticate(cred).then(this.handleCred.bind(this));
    }

    handleCred( isValidCred ){
        if (isValidCred) {
            this.props.history.push('/');
        }else{
            this.setState({password:''}, () => alert('wrong cred') )
        }
    }

    render(){
        return (
            <div>
                <div>Login Form</div>

                <input 
                    placeholder='type your email'
                    type='text' 
                    value={this.state.email} 
                    onChange={(e)=>this.setState({email:e.target.value})} 
                />

                <input 
                    placeholder='type your password'
                    type='password' value={this.state.password} 
                    onChange={(e) => this.setState({password:e.target.value})} 
                />

                <button onClick={this.login.bind(this)} >
                    Log In
                </button>
                
            </div>
        );
    }
}
export default withRouter( Login );