import { ComponentFixture, TestBed } from '@angular/core/testing';
import { provideRouter, RouterModule } from '@angular/router';
import { MainNavigation } from '../main-navigation/main-navigation.component';

import { MobileFooter } from './mobile-footer.component';

describe('MobileFooter', () => {
  let component: MobileFooter;
  let fixture: ComponentFixture<MobileFooter>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [MobileFooter, MainNavigation],
      imports: [RouterModule],
      providers: [provideRouter([])]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MobileFooter);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
