/* eslint-disable */
import web3 from './web3';
import {abi} from 'realfund-smart-contracts/build/contracts/Crowdfunding.json'

const addressesDeploy = ['0x4DE88A53aDAa18109BB6F5918bc317eC8E9D7047', '0x582ff16f0B88E8Fda3760128976F8032D3624630', '0xF10231571E8209Ff60881D2A77e5184820580B3e', '0x78D82c58dfB3Ef9DC5034927BA360082cdbe5acD', '0xA6D0610dB2337c764495834d9ee827057D3d429c', '0x2c45672E66f94cd623C51AFa88283C9890eb7446', '0x0C4D1F0a863DffA9b3F379df6fce4aB07685aFD9', '0xA51eec858367065b1C3B41839362050E5f409540', '0x2c20b238eBf33b09E55541f1D22421a8824c33aa']
const [address] = addressesDeploy

const instance = new web3.eth.Contract(abi, address);

export default instance;
