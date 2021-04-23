import React from 'react';
import { withRouter } from 'react-router';

class Users extends React.Component
{
    constructor(props){
        super(props);
        this.state = {
            users:[],
        }
    }

    componentDidMount(){
        if (this.props.authManager.check()) {
            this.getUsers();
        }else{
            this.props.history.push('/login');
        }
    }

    async getUsers(){
        this.setState({
            users: await this.props.users.getAll()
        })
    }

    render(){
        return (
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>age</th>
                    </tr>
                </thead>
                <tbody>
                    {this.state.users.map( user => (
                        <tr key={user.id}>
                            <td>{user.id}</td>
                            <td>{user.name}</td>
                            <td>{user.age}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        )
    }
}

export default withRouter( Users );