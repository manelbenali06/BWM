export class User{
  "@id" ?:string;//le typage d emes variables
  id: number;
  email: string;
  roles:any = ["ROLE_USER"];
  password:string;
  is_verified:boolean =true;
  lastName: string;
  firstName: string;
  address:string;
  zipCode:number
  city:string;
}
